<!DOCTYPE html>
<html lang="en">

<head>
    <title><?= single_post_title() ?> <?= site_title() ?></title>
    <link rel="alternate" type="application/rss+xml" title="<?= site_title() ?>'s Feed" href="/feed" />
    <link rel="stylesheet" href="/app/static/common.css">
    <link rel="stylesheet" href="/app/themes/default/main.css">
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700|PT+Serif:400,400italic' rel='stylesheet' type='text/css'>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="/app/static/modernizr.js"></script>
    <script src="/app/static/jquery-1.11.2.min.js"></script>
    <script src="/app/themes/default/slices/slides.js"></script>

    <!-- disqus integration -->
    <link rel="stylesheet" href="/app/static/disqium/disqium.css">
    <script src="/app/static/disqium/disqium.js">

    <script type="application/javascript">
      window.Prismic = {
          endpoint: '<?= prismic_endpoint() ?>'
      };
    </script>
</head>

<body class="<?= is_front_page() ? 'front-page' : '' ?>">

    <div id="right-panel">
        <?php get_sidebar() ?>
    </div>

    <div id="main">
        <a id="menu-hamburger" href="#right-panel">
            <i class="fa fa-bars"></i>
        </a>

