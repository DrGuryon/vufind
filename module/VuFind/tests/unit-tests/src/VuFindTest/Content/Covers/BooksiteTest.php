<?php

/**
 * Unit tests for Booksite cover loader.
 *
 * PHP version 5
 *
 * Copyright (C) Villanova University 2010.
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License version 2,
 * as published by the Free Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 *
 * @category VuFind2
 * @package  Search
 * @author   Demian Katz <demian.katz@villanova.edu>
 * @license  http://opensource.org/licenses/gpl-2.0.php GNU General Public License
 * @link     http://vufind.org
 */
namespace VuFindTest\Content\Covers;
use VuFindCode\ISBN, VuFind\Content\Covers\Booksite;

/**
 * Unit tests for Booksite cover loader.
 *
 * @category VuFind2
 * @package  Search
 * @author   Demian Katz <demian.katz@villanova.edu>
 * @license  http://opensource.org/licenses/gpl-2.0.php GNU General Public License
 * @link     http://vufind.org
 */
class BooksiteTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test cover loading
     *
     * @return void
     */
    public function testValidCoverLoading()
    {
        $loader = new Booksite('http://base', 'mykey');
        $this->assertEquals(
            'http://base/poca/content_img?apikey=mykey&ean=9780739313121',
            $loader->getUrl(
                'mykey', 'small', ['isbn' => new ISBN('0739313126')]
            )
        );
    }

    /**
     * Test missing ISBN
     *
     * @return void
     */
    public function testMissingIsbn()
    {
        $loader = new Booksite('http://base', 'mykey');
        $this->assertEquals(false, $loader->getUrl('mykey', 'small', []));
    }
}