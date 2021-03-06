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

namespace BaleenTest\Migrations\Service\DomainBus\Migrate\Collection;

use Baleen\Migrations\Migration\OptionsInterface;
use Baleen\Migrations\Service\DomainBus\DomainCommandInterface;
use Baleen\Migrations\Service\DomainBus\Migrate\AbstractMigrateCommand;
use Baleen\Migrations\Service\DomainBus\Migrate\Collection\CollectionCommand;
use Baleen\Migrations\Common\Collection\CollectionInterface;
use Baleen\Migrations\Delta\Repository\VersionRepositoryInterface;
use Baleen\Migrations\Delta\DeltaInterface;
use BaleenTest\Migrations\BaseTestCase;
use Mockery as m;

/**
 * Class CollectionCommandTest
 * @author Gabriel Somoza <gabriel@strategery.io>
 */
class CollectionCommandTest extends BaseTestCase
{
    /**
     * createMockedCommand
     * @return CollectionCommand
     */
    public static function createMockedCommand()
    {
        /** @var CollectionInterface|m\Mock $collection */
        $collection = m::mock(CollectionInterface::class);
        /** @var DeltaInterface|m\Mock $target */
        $target = m::mock(DeltaInterface::class);
        /** @var OptionsInterface|m\Mock $options */
        $options = m::mock(OptionsInterface::class);
        /** @var VersionRepositoryInterface $versionRepository */
        $versionRepository = m::mock(VersionRepositoryInterface::class);
        return new CollectionCommand($collection, $target, $options, $versionRepository);
    }

    /**
     * testConstructor
     * @return void
     */
    public function testConstructor()
    {
        $command = static::createMockedCommand();
        $this->assertInstanceOf(DomainCommandInterface::class, $command);
    }
}
