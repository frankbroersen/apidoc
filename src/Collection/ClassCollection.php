<?php
/**
 * This file is part of Vegas package
 *
 * @author Slawomir Zytko <slawek@amsterdam-standard.pl>
 * @copyright Amsterdam Standard Sp. Z o.o.
 * @homepage http://vegas-cmf.github.io
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Vegas\ApiDoc\Collection;

use Vegas\ApiDoc\CollectionAbstract;

/**
 * Class ClassCollection
 *
 * @api(
 *  name='Api endpoint',
 *  description='Some description about endpoint',
 *  version='1.0.0'
 * )
 *
 * @package Vegas\ApiDoc\Collection
 */
class ClassCollection extends CollectionAbstract
{
    const NAME = 'class';

    public $name;

    public $description;

    public $version;
} 