<?php

namespace Drupal\sample\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

class SampleForm extends FormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'sample_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['#title'] = $this->t('Sample form');

    $form['color'] = [
      '#title' => $this->t("Select a color"),
      '#type' => 'select',
      '#options' => [
        '' => 'Select',
        'red' => $this->t('Red'),
        'blue' => $this->t('Blue'),
        'green' => $this->t('Green'),
      ],
      '#ajax' => [
        'callback' => '::promptCallback',
        'wrapper' => 'container',
      ],
    ];

    $form['container'] = [
      '#type' => 'container',
      '#attributes' => ['id' => 'container'],
    ];

    $color = $form_state->getValue('color');
    if ($color !== NULL) {
      $form['container']['text'] = [
        '#markup' => $this->t('You chose @color.', ['@color' => $color]),
      ];
    }

    $form['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Submit'),
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    // TODO: Implement submitForm() method.
  }

  /**
   * Handles AJAX callback.
   */
  public function promptCallback($form, FormStateInterface $form_state) {
    return $form['container'];
  }
}
