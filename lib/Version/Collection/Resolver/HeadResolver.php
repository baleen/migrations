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
 * <http://www.doctrine-project.org>.
 */

namespace Baleen\Migrations\Version\Collection\Resolver;

use Baleen\Migrations\Version;
use Baleen\Migrations\Version\Collection\IndexedVersions;
use Baleen\Migrations\Version\Collection\SortableVersions;

/**
 * Class HeadResolver
 * @author Gabriel Somoza <gabriel@strategery.io>
 */
class HeadResolver extends AbstractResolver
{
    const HEAD = 'head';

    /**
     * doResolve
     *
     * @param $alias
     * @param IndexedVersions $collection
     *
     * @return Version|null
     */
    protected function doResolve($alias, IndexedVersions $collection)
    {
        if (!$collection instanceof SortableVersions || strtolower($alias) !== self::HEAD) {
            return null;
        }

        foreach ($collection->getReverse() as $version) {
            if ($version->isMigrated()) {
                return $version;
            }
        }
        return null;
    }
}