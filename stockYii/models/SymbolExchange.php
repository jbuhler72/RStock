<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "symbolExchange".
 *
 * @property string $symbol
 * @property string $exchange
 */
class SymbolExchange extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'symbolExchange';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['symbol', 'exchange'], 'required'],
            [['symbol', 'exchange'], 'string', 'max' => 75],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'symbol' => 'Symbol',
            'exchange' => 'Exchange',
        ];
    }
}
