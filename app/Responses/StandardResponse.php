<?php
namespace App\Responses;

use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 */
class StandardResponse implements Responsable
{
    /**
     * Response constants.
     */
    protected const RESPONSE_FIELD_SUCCESS = 'success';
    protected const RESPONSE_FIELD_CODE = 'code';
    protected const RESPONSE_FIELD_MESSAGE = 'message';
    protected const RESPONSE_FIELD_DATA = 'data';

    /**
     * @var bool
     */
    private $success;

    /**
     * @var int
     */
    private $code;

    /**
     * @var string
     */
    private $message;

    /**
     * @var array|null
     */
    private $data;

    /**
     * StandardResponse constructor.
     *
     * @param null $data
     * @param string $message
     * @param int $code
     * @param bool $success
     */
    public function __construct($data = null, $message = '', $code = 200, $success = true)
    {
        $this->success = $success;
        $this->code = $code;
        $this->message = $message;
        $this->data = $data;
    }

    /**
     * @param Request $request
     *
     * @return Response
     */
    public function toResponse($request)
    {
        return response()->json(
            [
                self::RESPONSE_FIELD_SUCCESS => $this->success,
                self::RESPONSE_FIELD_CODE => $this->code,
                self::RESPONSE_FIELD_MESSAGE => $this->message,
                self::RESPONSE_FIELD_DATA => $this->data
            ]
        );
    }
}
