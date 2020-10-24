<?php

class AuthControllerTest extends TestCase
{
	/** @test */
	public function registerSuccess() {
        $params = [
            'FirstName' 	=> 'Mashrafee',
            'LastName' 		=> 'Mortaza',
            'Email' 		=> 'virat1@gmail.com',
            'MobileNo' 		=> '01712368549',
            'Password' 		=> '123456'
		];

        $response = $this->call('POST', '/api/v1/register', $params);
        $json = json_decode($response->getContent());
        $this->assertResponseOk();

        // Check and test json response
        $this->assertEquals('OK', $json->status);
        $this->assertTrue($json->success);
        $this->assertEquals(200, $json->code);
        $this->assertTrue(isset($json->message));
        $this->assertTrue(!empty($json->data));

        // Check and test database data
        $user = \App\Models\User::where('Email', $params['Email'])->first();
        $this->assertTrue(!empty($user));
        $this->assertTrue(isset($user->Email));   
	}

	/** @test */
	public function registerFailure() {
        $params = [
            'FirstName' 	=> 'Mashrafee',
            'LastName' 		=> 'Mortaza',
            'Email' 		=> 'virat1@gmail.com',
            'MobileNo' 		=> '01712368549',
            'Password' 		=> '123456'
		];

        $response = $this->call('POST', '/api/v1/register', $params);
        $this->assertResponseStatus(400);

        $json = json_decode($response->getContent());

		$this->assertEquals('FAILED', $json->status);
        $this->assertFalse($json->success);
        $this->assertEquals('Failed to pass validation !', $json->message);
        $this->assertEquals(400, $json->code);
        $this->assertEquals(null, $json->data);
	}
	
	/** @test */
	public function loginSuccess() {
		$params = [
            'Email' 		=> 'virat1@gmail.com',
            'Password' 		=> '123456'
		];

        $response = $this->call('POST', '/api/v1/login', $params);
        $json = json_decode($response->getContent());
        $this->assertResponseOk();

        // Check and test json response
        $this->assertEquals('OK', $json->status);
        $this->assertTrue($json->success);
        $this->assertEquals(200, $json->code);
        $this->assertEquals('Successfully logged in !', $json->message);
		$this->assertTrue(!empty($json->data));
	}
	
	/** @test */
	public function loginFailure() {
		$params = [
            'Email' 		=> 'virat1@gmail.com',
            'Password' 		=> '123456sdfasdsdfsadfasfsadfasdfa' // Wrong password
		];

        $response = $this->call('POST', '/api/v1/login', $params);
        $json = json_decode($response->getContent());
        $this->assertResponseStatus(400);

        // Check and test json response
        $this->assertEquals('FAILED', $json->status);
        $this->assertFalse($json->success);
        $this->assertEquals(400, $json->code);
        $this->assertEquals('Does\'t match email or password !', $json->message);
        $this->assertEquals(null, $json->data);
    }
}
