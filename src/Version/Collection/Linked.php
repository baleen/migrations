<?php
/*
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS
 * "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT
 * LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR
 * A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT
 * OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL,
 * SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT
 * LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE,
 * DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY
 * THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
 * (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE
 * OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 *
 * This software consists of voluntary contributions made by many individuals
 * and is licensed under the MIT license. For more information, see
 * <https://github.com/baleen/migrations>.
 */

namespace Baleen\Migrations\Version\Collection;

use Baleen\Migrations\Exception\Version\Collection\CollectionException;
use Baleen\Migrations\Version\Collection\Resolver\ResolverInterface;
use Baleen\Migrations\Version\Comparator\ComparatorInterface;
use Baleen\Migrations\Version\Specification\IsLinked;
use Baleen\Migrations\Version\SpecificationInterface;
use Baleen\Migrations\Version\Validator\AggregateValidator;
use Baleen\Migrations\Version\VersionInterface;

/**
 * Represents a set of Versions, all of which must be linked to a Migration.
 *
 * @author Gabriel Somoza <gabriel@strategery.io>
 */
class Linked extends Sortable
{
    /**
     * @param VersionInterface[]|\Traversable $versions
     * @param ResolverInterface $resolver
     * @param ComparatorInterface $comparator
     *
     * @throws \Baleen\Migrations\Exception\InvalidArgumentException
     */
    public function __construct(
        $versions = [],
        ResolverInterface $resolver = null,
        ComparatorInterface $comparator = null
    ) {
        $validator = new AggregateValidator([new IsLinked()]);
        parent::__construct($versions, $resolver, $comparator, $validator);
    }
}
