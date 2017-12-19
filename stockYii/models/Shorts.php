<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "shorts".
 *
 * @property integer $id
 * @property string $stockSymbol
 * @property integer $shortVolume
 * @property string $shortDate
 * @property integer $shortTotalVolume
 * @property integer $ShortExemptVolume
 * @property string $exchange
 * @property string $shortPercent
 */
class Shorts extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'shorts';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['stockSymbol', 'shortVolume', 'shortTotalVolume', 'ShortExemptVolume', 'exchange', 'shortPercent'], 'required'],
            [['shortVolume', 'shortTotalVolume', 'ShortExemptVolume'], 'integer'],
            [['shortDate'], 'safe'],
            [['shortPercent'], 'number'],
            [['stockSymbol', 'exchange'], 'string', 'max' => 75],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'stockSymbol' => 'Stock Symbol',
            'shortVolume' => 'Short Volume',
            'shortDate' => 'Short Date',
            'shortTotalVolume' => 'Short Total Volume',
            'ShortExemptVolume' => 'Short Exempt Volume',
            'exchange' => 'Exchange',
            'shortPercent' => 'Short Percent',
        ];
    }
}
