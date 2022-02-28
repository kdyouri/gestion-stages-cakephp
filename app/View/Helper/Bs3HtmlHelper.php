<?php
App::uses('HtmlHelper', 'View/Helper');

class Bs3HtmlHelper extends HtmlHelper {

    /**
     * @param string $title
     * @param null $url
     * @param array $options
     * @param bool $confirmMessage
     * @return string
     */
    public function link($title, $url = null, $options = array(), $confirmMessage = false) {
        if (!AccessList::isAuthorized($this->Session->read('Auth.User'), $url)) return '';

        if (isset($options['icon'])) {
            $icon = $this->tag('i', '', ['class' => "fa fa-fw fa-{$options['icon']}"]);
            $title = "$icon $title";

            unset($options['icon']);
            $options['escape'] = false;
        }
        return parent::link($title, $url, $options, $confirmMessage);
    }
}