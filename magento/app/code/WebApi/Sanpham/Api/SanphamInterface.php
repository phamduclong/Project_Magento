<?php
namespace WebApi\Sanpham\Api;

interface SanphamInterface
{
    /**
     * Returns greeting message to user
     *
     * @api
     * @param string $name Users name.
     * @return string Greeting message with users name.
     */
    public function id($id);
}
