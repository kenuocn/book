<?php

namespace App\Http\Requests;
use App\Http\Models\M3Result;
use Illuminate\Foundation\Http\FormRequest;

class ValidateCodeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'phone'=>'request', //必填

        ];
    }

    /**
     * laravel自动验证自定义错误信息
     * @return string 错误信息
     */
    public function message(){
        $m3_result = new M3Result;
        $m3_result->status = 1;
        $m3_result->message = '标题不能为空';
        return [
            'phone.request'=>$m3_result->toJson(),
        ];
    }
    
}
