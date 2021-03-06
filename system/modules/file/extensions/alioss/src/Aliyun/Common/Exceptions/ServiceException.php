<?php
/**
 * Copyright (C) Alibaba Cloud Computing
 * All rights reserved.
 *
 * 版权所有 （C）阿里云计算有限公司
 */
namespace Aliyun\Common\Exceptions;

/**
 * <p>
 * 表示阿里云服务返回的错误消息。
 * </p>
 *
 * <p>
 * ServiceException用于处理阿里云服务返回的错误消息。比如，用于身份验证的Access ID不存在，
 * 则会抛出ServiceException（严格上讲，会是该类的一个继承类。比如，OTSClient会抛出OTSException）。
 * 异常中包含了错误代码，用于让调用者进行特定的处理。
 * </p>
 *
 * <p>
 * ClientException表示的则是在向阿里云服务发送请求时出现的错误，以及客户端无法处理返回结果。
 * 例如，在发送请求时网络连接不可用，则会抛出ClientException的异常。
 * </p>
 *
 * <p>
 * 通常来讲，调用者只需要处理ClientException。因为该异常表明请求被服务处理，但处理的结果表明
 * 存在错误。异常中包含了细节的信息，特别是错误代码，可以帮助调用者进行处理。
 * </p>
 *
 * @package Aliyun\Common\Exceptions
 */
class ServiceException extends \RuntimeException
{
    protected $requestId;
    protected $hostId;
    protected $errorCode;

    public function __construct($errorCode, $message, $requestId, $hostId)
    {
        parent::__construct($message);
        $this->requestId = $requestId;
        $this->hostId = $hostId;
        $this->errorCode = $errorCode;
    }

    /**
     * 返回错误代码
     * @return 错误代码
     */
    public function getErrorCode()
    {
        return $this->errorCode;
    }

    /**
     * 返回Request标识。
     * @return Request标识。
     */
    public function getRequestId()
    {
        return $this->requestId;
    }

    /**
     * 返回Host标识。
     * @return Host标识。
     */
    public function getHostId()
    {
        return $this->hostId;
    }
}
