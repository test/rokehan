<?php

/**
 * OAuthAdminToken form base class.
 *
 * @method OAuthAdminToken getObject() Returns the current form's model object
 *
 * @package    OpenPNE
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseOAuthAdminTokenForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                => new sfWidgetFormInputHidden(),
      'oauth_consumer_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Consumer'), 'add_empty' => false)),
      'key_string'        => new sfWidgetFormInputText(),
      'secret'            => new sfWidgetFormInputText(),
      'type'              => new sfWidgetFormChoice(array('choices' => array('request' => 'request', 'access' => 'access'))),
      'is_active'         => new sfWidgetFormInputCheckbox(),
      'callback_url'      => new sfWidgetFormTextarea(),
      'verifier'          => new sfWidgetFormTextarea(),
      'created_at'        => new sfWidgetFormDateTime(),
      'updated_at'        => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'oauth_consumer_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Consumer'))),
      'key_string'        => new sfValidatorString(array('max_length' => 16, 'required' => false)),
      'secret'            => new sfValidatorString(array('max_length' => 32, 'required' => false)),
      'type'              => new sfValidatorChoice(array('choices' => array(0 => 'request', 1 => 'access'), 'required' => false)),
      'is_active'         => new sfValidatorBoolean(array('required' => false)),
      'callback_url'      => new sfValidatorString(array('max_length' => 2147483647, 'required' => false)),
      'verifier'          => new sfValidatorString(array('max_length' => 2147483647, 'required' => false)),
      'created_at'        => new sfValidatorDateTime(),
      'updated_at'        => new sfValidatorDateTime(),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'OAuthAdminToken', 'column' => array('key_string', 'secret')))
    );

    $this->widgetSchema->setNameFormat('o_auth_admin_token[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'OAuthAdminToken';
  }

}
