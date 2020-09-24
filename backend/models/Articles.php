<?php

namespace backend\models;

use Yii;
use yii\behaviors\SluggableBehavior;

/**
 * This is the model class for table "articles".
 *
 * @property int $id
 * @property string $title
 * @property string $post
 * @property int|null $category_id
 * @property string $feature_image
 * @property string $inner_post_image
 * @property string|null $slug
 * @property string $created_at
 * @property string $updated_at
 */
class Articles extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'articles';
    }

    public function behaviors()
    {
        return [
            [
                'class' => SluggableBehavior::className(),
                'attribute' => 'title',
                'ensureUnique' => true,
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'post'], 'required'],
            [['post'], 'string'],
            [['category_id'], 'integer'],
            [['created_at', 'updated_at', 'feature_image', 'inner_post_image'], 'safe'],
            [['feature_image', 'inner_post_image'], 'file', 'extensions' => 'png,jpg,gif,jpeg', 'skipOnEmpty' => true],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'post' => 'Post',
            'category_id' => 'Category ID',
            'feature_image' => 'Feature Image',
            'inner_post_image' => 'Inner Post Image',
            'slug' => 'Slug',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
