<?php

use Drupal\sample\Form\SampleForm;

/**
 * Implements hook_install_tasks().
 */
function sample_install_tasks(&$install_state) {
  return [
    SampleForm::class => [
      'display_name' => t('Sample form'),
      'type' => 'form',
    ],
  ];
}
