<?php

/**
 * @OA\Get(
 *     path="/candidates",
 *     tags={"Candidates"},
 *     summary="Get Candidates",
 *     @OA\Parameter(
 *         name="filter[status]",
 *         description="Filter by status",
 *         required=false,
 *         in="query",
 *         @OA\Schema(
 *             type="string",
 *         ),
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Get Candidates",
 *     ),
 * )
 */
