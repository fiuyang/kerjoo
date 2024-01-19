<?php

namespace Tests\Feature;

use App\User;
use App\AnnualLeave;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AnnualLeaveTest extends TestCase
{
     /**
     * Test Create Annual Leave Success
     * Test POST /annual-leaves endpoint.
     *
     * @return void
     */
    public function test_create_annual_leave_success()
    {
        $user = factory(User::class)->create();

        $response = $this->post('/api/annual-leaves', [
            'user_id' => $user->id,
            'start_date' => '2023-10-12',
            'end_date' => '2023-11-12',
            'approval_date' => '2023-10-15',
            'status' => 'approved',
            'reason' => 'cuti tahunan bersama keluarga',
        ]);

        $response->assertStatus(201)
             ->assertJsonStructure(['data' => ['id', 'user_id', 'start_date', 'end_date', 'approval_date', 'status', 'reason']])
             ->assertJson([
                'data' => [
                    'user_id' => $user->id,
                    'start_date' => '2023-10-12',
                    'end_date' => '2023-11-12',
                    'approval_date' => '2023-10-15',
                    'status' => 'approved',
                    'reason' => 'cuti tahunan bersama keluarga',
                ]
            ]);
    }

    /**
     * Test Created Annual Leave Failed
     * Test POST /annual-leaves endpoint.
     *
     * @return void
     */
    public function test_create_annual_leave_failed()
    {
        $response = $this->post('/api/annual-leaves', [
            'user_id' => '',
            'start_date' => '',
            'end_date' => '',
            'status' => '',
            'reason' => '',
        ]);
    
        $response->assertStatus(400)
            ->assertJson([
                'errors' => [
                    'user_id' => [
                        'The user id field is required.'
                    ],
                    'start_date' => [
                        'The start date field is required.'
                    ],
                    'end_date' => [
                        'The end date field is required.'
                    ],
                    'status' => [
                        'The status field is required.'
                    ],
                    'reason' => [
                        'The reason field is required.'
                    ]
                ]
            ]);
    }


    /**
     * Test Get Annual Leaves Success
     * Test GET /annual-leaves endpoint.
     *
     * @return void
     */
    public function test_get_annual_leaves_success()
    {
        $user = factory(User::class)->create();
        $annualLeaves = factory(AnnualLeave::class)->create(['user_id' => $user->id]);

        $response = $this->get('/api/annual-leaves/')->assertStatus(200);
        $response->assertJsonCount($annualLeaves->count(), 'data');
    }

    /**
     * Test Get Annual Leave Success
     * Test GET /annual-leaves/{id} endpoint.
     *
     * @return void
     */
    public function test_get_annual_leave_success()
    {
        $user = factory(User::class)->create();
        $annualLeave = factory(AnnualLeave::class)->create(['user_id' => $user->id]);

        $response = $this->get('/api/annual-leaves/' . $annualLeave->id);

        $response->assertStatus(200)
        ->assertJsonStructure([
            'data' => [
                'id', 
                'user_id', 
                'start_date', 
                'end_date', 
                'approval_date', 
                'status', 
                'reason'
            ]
        ]);
    }
}
