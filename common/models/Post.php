<?php

namespace common\models;

use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\data\ActiveDataProvider;
use yii\data\Pagination;

/**
 * Class Post
 * @package common\models
 */
class Post extends ActiveRecord
{

	public $page_size = 10;

	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return '{{%post}}';
	}

	/**
	 * @inheritdoc
	 */
	public function behaviors()
	{
		return [
			TimestampBehavior::className(),
		];
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			[['title', 'content'], 'required'],
			[['content'], 'string'],
			[['created_at','updated_at'], 'safe'],
			[['title'], 'string', 'max' => 128]
		];
	}

//	public function extraFields()
//	{
//		return [
//			'comments',
//		];
//	}

	/**
	 * @return array
	 */
	public function fields()
	{
		return [
			'id',
			'title',
			'content',
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'id' => 'ID',
			'title' => 'Title',
			'content' => 'Content',
			'created_at' => 'created_at',
			'updated_at' => 'updated',
		];
	}

	public function search($params)
	{
		$query = Post::find();

		$dataProvider = new ActiveDataProvider([
			'query' => $query,
			'pagination' => new Pagination([
					'pageSize' => $this->page_size
				])
		]);

		if (!($this->load($params))) {
			return $dataProvider;
		}

		$query->andFilterWhere(['like', 'title', $this->content]);
		$query->andFilterWhere(['like', 'content', $this->content]);

		return $dataProvider;
	}
}

