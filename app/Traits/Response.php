<?php
namespace App\Traits;

use App\Responses\StandardResponse;

/**
 */
trait Response
{
    /**
     * @param null $data
     * @param string $message
     * @param bool $success
     * @param int $code
     *
     * @return StandardResponse
     */
    public function response($data = null, string $message = '', int $code = 200, $success = true)
    {
        return new StandardResponse($data, $message, $code, $success);
    }

    /**
     * @param $message
     * @param $data
     * @param int $code
     *
     * @return StandardResponse
     */
    public function success($data, $message = '', $code = 200)
    {
        return $this->response($data, $message, $code);
    }

    /**
     * @param $message
     * @param int $code
     *
     * @return StandardResponse
     */
    public function error($message, $code = 500)
    {
        return $this->response(null, $message, $code,  false);
    }
}
