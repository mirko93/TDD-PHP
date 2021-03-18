<?php

namespace Feature;

use App\Models\Contact;
use PHPUnit\Framework\TestCase;

class ContactsTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->contact = new Contact();
    }

    /** @test */
    public function that_we_can_get_the_firstname()
    {
        $this->contact->setFirstName('Test');
        $this->assertEquals($this->contact->getFirstName(), 'Test');
    }

    /** @test */
    public function that_we_can_get_the_lastname()
    {
        $this->contact->setLastName('Testing');
        $this->assertEquals($this->contact->getLastName(), 'Testing');
    }

    /** @test */
    public function full_name_is_returned()
    {
        $this->contact->setFirstName('Test');
        $this->contact->setLastName('Testing');

        $this->assertEquals($this->contact->getFullName(), 'Test Testing');
    }
    
    /** @test */
    public function test_first_and_last_name_are_trim()
    {
        $this->contact->setFirstName('    Test      ');
        $this->contact->setLastName('            Testing');

        $this->assertEquals($this->contact->getFirstName(), 'Test');
        $this->assertEquals($this->contact->getLastName(), 'Testing');
    }

    /** @test */
    public function email_address_can_be_set()
    {
        $this->contact->setEmail('test@email.com');
        $this->assertEquals($this->contact->getEmail(), 'test@email.com');
    }

    /** @test */
    public function email_variables_contain_correct_values()
    {
        $this->contact->setFirstName('Test');
        $this->contact->setLastName('Testing');
        $this->contact->setEmail('test@email.com');

        $emailVariables = $this->contact->getEmailVariables();

        $this->assertArrayHasKey('full_name', $emailVariables);
        $this->assertArrayHasKey('email', $emailVariables);

        $this->assertEquals($emailVariables['full_name'], 'Test Testing');
        $this->assertEquals($emailVariables['email'], 'test@email.com');
    }
}
