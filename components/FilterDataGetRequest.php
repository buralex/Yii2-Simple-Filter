<?php
namespace sanex\simplefilter\components;

use sanex\simplefilter\components\FilterData;
use Yii;

class FilterDataGetRequest extends FilterData
{
    /**
     * set filter `where` statement from parameters in GET request
     *
     * @return $this
     */
    protected function setFilterWhere()
    {
        if (Yii::$app->request->get('filter')) {
            $get = Yii::$app->request->get();
            foreach ($get as $category => $property) {
                if (!is_array($property)) {
                    $property = array($property);
                }
                if (array_search($category, array_keys($this->model->attributes))) {
                    $this->where[$category] = $property;
                } else {
                    $this->getParams[$category] = $property;
                }     
            }
        }
        
        return $this;
    }
}
