<?php

namespace BladeTester\CalendarBundle\Tests\Controller;

use BladeTester\CalendarBundle\Model\Color;

class CategoryControllerTest extends BaseTestCase {


    public function setUp() {
        parent::setUp();
        $this->truncateTables(array('events', 'event_categories'));
    }

    /**
     * @test
     */
    public function IShouldCreateAnEventCategory() {
        // Arrange
        $crawler = $this->visit('calendar_category_add');
        $form = $crawler->filter('form#category-add')->form();
        $form['category[name]'] = 'A sample category';
        $form['category[color]'] = Color::RED;

        // Act
        $this->client->submit($form);

        // Assert
        $categories = $this->categoryManager->findAll();
        $this->assertCount(1, $categories);
    }

}