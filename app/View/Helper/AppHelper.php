<?php
/**
 * Application level View Helper
 *
 * This file is application-wide helper file. You can put all
 * application-wide helper-related methods here.
 *
 * @link          https://cakephp.org CakePHP(tm) Project
 * @package       app.View.Helper
 * @since         CakePHP(tm) v 0.2.9
 */

App::uses('Helper', 'View');

/**
 * Application helper
 *
 * Add your application-wide methods in the class below, your helpers
 * will inherit them.
 *
 * @property SessionHelper $Session
 * @property HtmlHelper $Html
 * @package       app.View.Helper
 */
class AppHelper extends Helper {

    public $helpers = ['Session', 'Html'];

    /**
     * Renvoi la photo de profil
     *
     * @param array $options
     * @return string
     */
    public function avatar($options = []) {
        if (isset($options['data'])) {
            $data = $options['data'];
            unset($options['data']);
        } else {
            $data = $this->Session->read('Auth.User');
        }

        if (isset($data['Enseignant']['id'])) {
            $dir = 'enseignant';
            $id = $data['Enseignant']['id'];
        } else {
            $dir = 'etudiant';
            $id = $data['Etudiant']['id'];
        }
        $filename = "files/$dir/photo/$id/profile.jpg";
        $path = WWW_ROOT . $filename;

        if (file_exists($path)) {
            $url = "/$filename";
        } else {
            $url = 'no-avatar.png';
        }
        return $this->Html->image($url, $options);
    }

    /**
     * Renvoi le document uploadé
     *
     * @param string $field
     * @param array $options
     * @return string
     */
    public function document($field, $options = []) {
        if (isset($options['data'])) {
            $data = $options['data'];
            unset($options['data']);
        } else {
            $data = $this->request->data;
        }
        if (isset($data['Stage']['id'])) {
            $id = $data['Stage']['id'];
            $filename = $data['Stage'][$field];

            $relative = "files/stage/$field/$id/$filename";
            $absolute = WWW_ROOT . $relative;

            $attrs = [
                'class' => 'fa fa-file-text-o fa-2x',
                'title' => $filename,
                'data-toggle' => 'tooltip'
            ];

            if (file_exists($absolute)) {
                $attrs['class'] .= ' text-green';
                $icon = $this->Html->tag('i', '', $attrs);
                $link = $this->Html->tag('a', "$icon $filename", ['href' => "/$relative"]);

                return $this->Html->div('form-group', $link);
            }
        }
    }
}
