<?php

/**
 * @OA\Info(
 *     version="1.0.0",
 *     title="My Laravel API",
 *     description="API documentation for my Laravel project"
 * )
 *
 * @OA\Server(
 *     url=L5_SWAGGER_CONST_HOST,
 *     description="API Server"
 * )
 */
/**
 * @OA\Schema(
 *     schema="LoginRequest",
 *     type="object",
 *     required={"email","password"},
 *     @OA\Property(property="email", type="string", example="john@example.com"),
 *     @OA\Property(property="password", type="string", example="secret123")
 * )
 */

/**
 * @OA\Schema(
 *     schema="LoginResponse",
 *     type="object",
 *     @OA\Property(property="success", type="boolean", example=true),
 *     @OA\Property(property="message", type="string", example="Login Successfully."),
 *     @OA\Property(
 *         property="data",
 *         type="object",
 *         @OA\Property(property="token", type="string", example="1|xyz123token"),
 *         @OA\Property(property="user", type="object")
 *     )
 * )
 */

/**
 * @OA\Schema(
 *     schema="ErrorResponse",
 *     type="object",
 *     @OA\Property(property="success", type="boolean", example=false),
 *     @OA\Property(property="message", type="string", example="User and password not match."),
 *     @OA\Property(property="data", type="array", @OA\Items(type="string"))
 * )
 */
