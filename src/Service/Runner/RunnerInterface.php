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

namespace Baleen\Migrations\Service\Runner;

use Baleen\Migrations\Migration\OptionsInterface;
use Baleen\Migrations\Service\Runner\Event\Migration\MigrateAfterEvent;
use Baleen\Migrations\Common\Collection\CollectionInterface;
use Baleen\Migrations\Common\Event\Context\ContextInterface;
use Baleen\Migrations\Common\Event\DomainEventInterface;
use Baleen\Migrations\Delta\DeltaInterface;

/**
 * Describes an object that can run a CollectionAbstract of Versions
 *
 * @author Gabriel Somoza <gabriel@strategery.io>
 */
interface RunnerInterface
{
    /**
     * Runs a collection of versions towards the specified goal and using the specified options
     *
     * @param DeltaInterface $target
     * @param OptionsInterface $options
     *
     * @return DomainEventInterface An event with information on the changes to versions applied through the runner,
     *                              which can be used by the client to update the repository if necessary.
     */
    public function run(DeltaInterface $target, OptionsInterface $options);
}
