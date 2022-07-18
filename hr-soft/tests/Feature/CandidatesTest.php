<?php

namespace Tests\Feature;

use App\Models\Candidate;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class CandidatesTest extends TestCase
{
    /** @test */
    public function it_should_return_candidate()
    {
        /** @var Candidate $candidate */
        $candidate = Candidate::factory()->create();

        $response = $this->get('/api/candidates/'.$candidate->getId());

        $response
            ->assertJson(function (AssertableJson $json) use ($candidate) {
                $json->where('data.id', $candidate->getId());
            });

        $response->assertOk();
    }

    /** @test */
    public function it_should_return_candidates()
    {
        /** @var Candidate $candidate */
        $candidates = [];
        $candidates[] = Candidate::factory()->create();
        $candidates[] = Candidate::factory()->create();

        $response = $this->get('/api/candidates');

        $this->assertSameSize($response->json()['data'], $candidates);

        $response->assertOk();
    }

    /** @test */
    public function it_should_create_candidate()
    {
        $defaultData = [
            "firstName" => "John",
            "lastName" => "Doe",
            "position" => "Developer",
            "minSalary" => 1000,
            "maxSalary" => 5000,
            "linkedinUrl" => "www.linkeding.com/username",
        ];

        $response = $this->post('/api/candidates', $defaultData);

        $response->assertCreated();
    }
}
