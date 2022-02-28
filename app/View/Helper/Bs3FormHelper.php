<?php
App::uses('FormHelper', 'View/Helper');

class Bs3FormHelper extends FormHelper {

    public $helpers = ['Html', 'Session'];

    /**
     * @param mixed|null $model
     * @param array $options
     * @return string
     */
    public function create($model = null, $options = array()) {
        $options = array_replace_recursive($options, array(
            'inputDefaults' => array(
                'class' => 'form-control',
                'div' => ['class' => 'form-group', 'errorClass' => 'has-error'],
                'label' => array('class' => 'control-label'),
                'error' => array('attributes' => array('wrap' => 'span', 'class' => 'help-block'))
            ),
            'novalidate'
        ));
        return parent::create($model, $options);
    }

    /**
     * @param string $fieldName
     * @param array $options
     * @return string
     */
    public function checkbox($fieldName, $options = []) {
        $checkbox = parent::checkbox($fieldName, $options);
        $label = $this->label($fieldName, $checkbox . @$options['label']);
        return $this->Html->div('checkbox', $label);
    }

    /**
     * @param string $fieldName
     * @param array $options
     * @return string
     */
    public function static($fieldName, $options = []) {
        $hidden = parent::hidden($fieldName);
        $label = parent::label($fieldName, @$options['label']);
        $p = $this->Html->tag('p', parent::value($fieldName), ['class' => 'form-control-static']);
        $formGroup = $this->Html->div('form-group', $label . $p);

        return $hidden . $formGroup;
    }

    /**
     * @param string $title
     * @param null $url
     * @param array $options
     * @param bool $confirmMessage
     * @return string
     */
    public function postLink($title, $url = null, $options = array(), $confirmMessage = false) {
        if (!AccessList::isAuthorized($this->Session->read('Auth.User'), $url)) return '';

        if (isset($options['icon'])) {
            $icon = $this->Html->tag('i', '', ['class' => "fa fa-fw fa-{$options['icon']}"]);
            $title = "$icon $title";

            unset($options['icon']);
            $options['escape'] = false;
        }
        return parent::postLink($title, $url, $options, $confirmMessage);
    }

}