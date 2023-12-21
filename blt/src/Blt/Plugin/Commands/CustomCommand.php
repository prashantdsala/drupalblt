<?php

namespace Example\Blt\Plugin\Commands;


use Acquia\Blt\Robo\BltTasks;

/**
 * Defines commands in the "custom" namespace.
 */
class CustomCommand extends BltTasks {

  /**
   * Executes the custom command.
   *
   * @command custom-command
   * @param string $argument The argument for the custom command.
   *
   * @throws \Exception
   */
  public function customCommand($argument) {
    $config = $this->getConfigValue('custom_command') ?: [];
    $option1 = $config['option1'] ?? '';
    $option2 = $config['option2'] ?? '';

    $this->say("Executing custom command with argument: $argument");
    $this->say("Option 1 from blt.yml: $option1");
    $this->say("Option 2 from blt.yml: $option2");

    // Your custom logic here.
    // Example: $this->invokeCommand('deploy');
  }
}
