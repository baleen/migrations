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

namespace Baleen\Migrations\Version\Comparator;

use Baleen\Migrations\Version\VersionInterface;

/**
 * {@inheritDoc}
 *
 * @author Gabriel Somoza <gabriel@strategery.io>
 */
class DefaultComparator implements ComparatorInterface
{
    const ORDER_NORMAL = 1;
    const ORDER_REVERSE = -1;

    /** @var int */
    protected $order = self::ORDER_NORMAL; // -1 for reverse order

    /**
     * DefaultComparator constructor.
     *
     * @param int $order
     */
    public function __construct($order = self::ORDER_NORMAL)
    {
        $this->order = (int) $order < 0 ? self::ORDER_REVERSE : self::ORDER_NORMAL;
    }

    /**
     * @inheritdoc
     *
     * Migrations1\v01
     * Migrations11\v01
     * Migrations2\v01
     */
    public function __invoke(VersionInterface $version1, VersionInterface $version2)
    {
        return strcmp($version1->getId(), $version2->getId()) * $this->order;
    }

    /**
     * Returns a reversed version of the comparator
     *
     * @return $this
     */
    public function reverse()
    {
        return new static($this->order * -1);
    }
}