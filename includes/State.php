<?php

class State {

    static $current_document_id;
    static $current_archive_date;
    static $current_category;
    static $current_posts;

    static function current_query()
    {
        global $app;
        return $app->request()->params('q');
    }

    static function current_page() {
        global $app;
        $pageQuery = $app->request()->params('page');
        return $pageQuery == null ? '1' : $pageQuery;
    }

    static function current_document() {
        if (State::$current_document_id == null) {
            return null;
        }
        return PrismicHelper::get_document(State::$current_document_id);
    }

    static function current_posts() {
        if (!State::$current_posts) {
            if (State::current_query() != null) {
                // Search page
                State::$current_posts = PrismicHelper::search(State::current_query(), State::current_page());
            } else if (State::current_archive_date() != null) {
                // Archive page
                State::$current_posts = PrismicHelper::archives(State::current_archive_date(), State::current_page());
            } else if (State::$current_category != null) {
                // Category page
                State::$current_posts = PrismicHelper::category(State::$current_category, State::current_page());
            }
            // Index page
            State::$current_posts = PrismicHelper::get_posts(State::current_page());
        }
        return State::$current_posts;
    }

    static function total_pages() {
        return State::current_posts()->getTotalPages();
    }

    static function set_current_archive($year, $month, $day) {
        State::$current_archive_date = array(
            'year' => $year,
            'month' => $month,
            'day' => $day
        );
    }

    static function current_archive_date() {
        return State::$current_archive_date;
    }

}
