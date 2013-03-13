<?php

namespace Thelia\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'category' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.Thelia.Model.map
 */
class CategoryTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'Thelia.Model.map.CategoryTableMap';

    /**
     * Initialize the table attributes, columns and validators
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('category');
        $this->setPhpName('Category');
        $this->setClassname('Thelia\\Model\\Category');
        $this->setPackage('Thelia.Model');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('parent', 'Parent', 'INTEGER', false, null, null);
        $this->addColumn('link', 'Link', 'VARCHAR', false, 255, null);
        $this->addColumn('visible', 'Visible', 'TINYINT', true, null, null);
        $this->addColumn('position', 'Position', 'INTEGER', true, null, null);
        $this->addColumn('created_at', 'CreatedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('updated_at', 'UpdatedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('version', 'Version', 'INTEGER', false, null, 0);
        $this->addColumn('version_created_at', 'VersionCreatedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('version_created_by', 'VersionCreatedBy', 'VARCHAR', false, 100, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('ProductCategory', 'Thelia\\Model\\ProductCategory', RelationMap::ONE_TO_MANY, array('id' => 'category_id', ), 'CASCADE', 'RESTRICT', 'ProductCategorys');
        $this->addRelation('FeatureCategory', 'Thelia\\Model\\FeatureCategory', RelationMap::ONE_TO_MANY, array('id' => 'category_id', ), 'CASCADE', 'RESTRICT', 'FeatureCategorys');
        $this->addRelation('AttributeCategory', 'Thelia\\Model\\AttributeCategory', RelationMap::ONE_TO_MANY, array('id' => 'category_id', ), 'CASCADE', 'RESTRICT', 'AttributeCategorys');
        $this->addRelation('ContentAssoc', 'Thelia\\Model\\ContentAssoc', RelationMap::ONE_TO_MANY, array('id' => 'category_id', ), 'CASCADE', 'RESTRICT', 'ContentAssocs');
        $this->addRelation('Image', 'Thelia\\Model\\Image', RelationMap::ONE_TO_MANY, array('id' => 'category_id', ), 'CASCADE', 'RESTRICT', 'Images');
        $this->addRelation('Document', 'Thelia\\Model\\Document', RelationMap::ONE_TO_MANY, array('id' => 'category_id', ), 'CASCADE', 'RESTRICT', 'Documents');
        $this->addRelation('Rewriting', 'Thelia\\Model\\Rewriting', RelationMap::ONE_TO_MANY, array('id' => 'category_id', ), 'CASCADE', 'RESTRICT', 'Rewritings');
        $this->addRelation('CategoryI18n', 'Thelia\\Model\\CategoryI18n', RelationMap::ONE_TO_MANY, array('id' => 'id', ), 'CASCADE', null, 'CategoryI18ns');
        $this->addRelation('CategoryVersion', 'Thelia\\Model\\CategoryVersion', RelationMap::ONE_TO_MANY, array('id' => 'id', ), 'CASCADE', null, 'CategoryVersions');
    } // buildRelations()

    /**
     *
     * Gets the list of behaviors registered for this table
     *
     * @return array Associative array (name => parameters) of behaviors
     */
    public function getBehaviors()
    {
        return array(
            'timestampable' =>  array (
  'create_column' => 'created_at',
  'update_column' => 'updated_at',
  'disable_updated_at' => 'false',
),
            'i18n' =>  array (
  'i18n_table' => '%TABLE%_i18n',
  'i18n_phpname' => '%PHPNAME%I18n',
  'i18n_columns' => 'title, description, chapo, postscriptum',
  'i18n_pk_name' => NULL,
  'locale_column' => 'locale',
  'default_locale' => NULL,
  'locale_alias' => '',
),
            'versionable' =>  array (
  'version_column' => 'version',
  'version_table' => '',
  'log_created_at' => 'true',
  'log_created_by' => 'true',
  'log_comment' => 'false',
  'version_created_at_column' => 'version_created_at',
  'version_created_by_column' => 'version_created_by',
  'version_comment_column' => 'version_comment',
),
        );
    } // getBehaviors()

} // CategoryTableMap