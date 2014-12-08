<?php

use Prismic\Document;

abstract class BlogDocument
{
    public $document;
    protected $prismic;

    public function __construct(Document $doc, PrismicHelper $prismic)
    {
        $this->document = $doc;
        $this->prismic = $prismic;
    }

    public function getTitle()
    {
        return $this->document->getText($this->document->getType() . ".title");
    }

    public function getBody()
    {
        $body = $this->document->getStructuredText($this->document->getType() . ".body");
        return $body ? $body->asHtml() : null;
    }

    public function getPermalink()
    {
        return $this->prismic->linkResolver->resolveDocument($this->document);
    }

    public function getDate()
    {
        $date = $this->document->getDate($this->document->getType() . ".date");
        return $date ? $date->asDateTime() : null;
    }

    public function getAuthor()
    {
        $authorLink = $this->document->getLink($this->document->getType() . ".author");
        if (!$authorLink) return null;
        return Author::fromId($this->prismic, $authorLink->getId());
    }

    public static function fromPrismicDoc(\Prismic\Document $document, PrismicHelper $prismic)
    {
        if (!$document) return null;
        switch ($document->getType()) {
            case "post": return new Post($document, $prismic);
            case "author": return new Author($document, $prismic);
            case "category": return new Category($document, $prismic);
            case "page": return new Page($document, $prismic);
        }
    }

    public static function fromId(PrismicHelper $prismic, $docId)
    {
        return BlogDocument::fromPrismicDoc($prismic->get_document($docId), $prismic);
    }

}