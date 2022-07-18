<?php

/**
 * @OA\Get(
 *     path="/api/candidates",
 *     tags={"Candidates"},
 *     summary="Get Candidates",
 *     @OA\Parameter(
 *         name="filter[statusId]",
 *         description="Filter by status",
 *         required=false,
 *         in="path",
 *         @OA\Schema(
 *             type="integer",
 *         ),
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Get Candidates",
 *     ),
 * )
 */

/**
 * @OA\Get(
 *     path="/api/candidates/{id}",
 *     tags={"Candidates"},
 *     summary="Get Candidate",
 *     @OA\Parameter(
 *         name="id",
 *         description="Candidate id",
 *         required=true,
 *         in="path",
 *         @OA\Schema(
 *             type="integer",
 *         ),
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Get Candidates",
 *     ),
 * )
 */

/**
 * @OA\Post(
 *     path="/api/candidates",
 *     tags={"Candidates"},
 *     summary="Create Candidate",
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(
 *                 required={"firstName","lastName","position"},
 *                 @OA\Property(
 *                     property="firstName",
 *                     description="First name",
 *                     example="John",
 *                     @OA\Schema(
 *                         type="string"
 *                     )
 *                 ),
 *                 @OA\Property(
 *                     property="lastName",
 *                     description="Last name",
 *                     example="Doe",
 *                     @OA\Schema(
 *                         type="string"
 *                     )
 *                 ),
 *                 @OA\Property(
 *                     property="position",
 *                     description="Position",
 *                     example="developer",
 *                     @OA\Schema(
 *                         type="string"
 *                     )
 *                 ),
 *                 @OA\Property(
 *                     property="minSalary",
 *                     description="Mnimun salary",
 *                     example="1000",
 *                     @OA\Schema(
 *                         type="integer"
 *                     )
 *                 ),
 *                 @OA\Property(
 *                     property="maxSalary",
 *                     description="Maximum salary",
 *                     example="50000",
 *                     @OA\Schema(
 *                         type="integer",
 *                     )
 *                 ),
 *                 @OA\Property(
 *                     property="linkedinUrl",
 *                     description="Linkedin URL",
 *                     example="www.linkeding.com/username",
 *                     @OA\Schema(
 *                         type="string"
 *                     )
 *                 ),
 *                 @OA\Property(
 *                     property="skillIds",
 *                     description="Candidate Skill Ids",
 *                     example="[1,2,3]",
 *                     @OA\Schema(
 *                         type="array"
 *                     )
 *                 ),
 *                 @OA\Property(
 *                     property="files",
 *                     description="Candidate CV",
 *                     example="",
 *                     @OA\Schema(
 *                         type="array"
 *                     )
 *                 ),
 *             ),
 *         ),
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="create candidate",
 *     ),
 * )
 */

/**
 * @OA\Put(
 *     path="/api/candidates/{id}",
 *     tags={"Candidates"},
 *     summary="Create Candidate",
 *     @OA\Parameter(
 *         name="id",
 *         description="Candidate id",
 *         required=true,
 *         in="path",
 *         @OA\Schema(
 *             type="integer",
 *         ),
 *     ),
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(
 *                 required={"firstName","lastName","position"},
 *                 @OA\Property(
 *                     property="firstName",
 *                     description="First name",
 *                     example="John",
 *                     @OA\Schema(
 *                         type="string"
 *                     )
 *                 ),
 *                 @OA\Property(
 *                     property="lastName",
 *                     description="Last name",
 *                     example="Doe",
 *                     @OA\Schema(
 *                         type="string"
 *                     )
 *                 ),
 *                 @OA\Property(
 *                     property="position",
 *                     description="Position",
 *                     example="developer",
 *                     @OA\Schema(
 *                         type="string"
 *                     )
 *                 ),
 *                 @OA\Property(
 *                     property="minSalary",
 *                     description="Mnimun salary",
 *                     example="1000",
 *                     @OA\Schema(
 *                         type="integer"
 *                     )
 *                 ),
 *                 @OA\Property(
 *                     property="maxSalary",
 *                     description="Maximum salary",
 *                     example="50000",
 *                     @OA\Schema(
 *                         type="integer",
 *                     )
 *                 ),
 *                 @OA\Property(
 *                     property="linkedinUrl",
 *                     description="Linkedin URL",
 *                     example="www.linkeding.com/username",
 *                     @OA\Schema(
 *                         type="string"
 *                     )
 *                 ),
 *                 @OA\Property(
 *                     property="skillIds",
 *                     description="Candidate Skill Ids",
 *                     example="[1,2,3]",
 *                     @OA\Schema(
 *                         type="array"
 *                     )
 *                 ),
 *                 @OA\Property(
 *                     property="files",
 *                     description="Candidate CV",
 *                     example="",
 *                     @OA\Schema(
 *                         type="array"
 *                     )
 *                 ),
 *             ),
 *         ),
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="create candidate",
 *     ),
 * )
 */

/**
 * @OA\Post(
 *     path="/api/candidates/{candidateId}/change-status",
 *     tags={"Candidates"},
 *     summary="Cjange Candidates status",
 *     @OA\Parameter(
 *         name="candidateId",
 *         description="Candidate Id",
 *         required=true,
 *         in="path",
 *         @OA\Schema(
 *             type="integer",
 *         ),
 *     ),
 *     @OA\Parameter(
 *         name="statusId",
 *         description="Status Id",
 *         required=true,
 *         in="query",
 *         @OA\Schema(
 *             type="integer",
 *         ),
 *     ),
 *     @OA\RequestBody(
 *         @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(
 *                 @OA\Property(
 *                     property="comment",
 *                     description="comment",
 *                     example="reject reason",
 *                     @OA\Schema(
 *                         type="string"
 *                     )
 *                 ),
 *             ),
 *         ),
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Get Candidates",
 *     ),
 * )
 */

/**
 * @OA\Get(
 *     path="/api/candidates/{candidateId}/timeline",
 *     tags={"Candidates"},
 *     summary="Get Candidate Timeline",
 *     @OA\Parameter(
 *         name="candidateId",
 *         description="Candidate id",
 *         required=true,
 *         in="path",
 *         @OA\Schema(
 *             type="integer",
 *         ),
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Get Candidates",
 *     ),
 * )
 */
