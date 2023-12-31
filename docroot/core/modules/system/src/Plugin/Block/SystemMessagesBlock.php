<?php

namespace Drupal\system\Plugin\Block;

use Drupal\Core\Block\Attribute\Block;
use Drupal\Core\Block\BlockBase;
use Drupal\Core\Block\MessagesBlockPluginInterface;
use Drupal\Core\Cache\Cache;
use Drupal\Core\StringTranslation\TranslatableMarkup;

/**
 * Provides a block to display the messages.
 *
 * @see @see \Drupal\Core\Messenger\MessengerInterface
 */
#[Block(
  id: "system_messages_block",
  admin_label: new TranslatableMarkup("Messages")
)]
class SystemMessagesBlock extends BlockBase implements MessagesBlockPluginInterface {

  /**
   * {@inheritdoc}
   */
  public function defaultConfiguration() {
    return [
      'label_display' => FALSE,
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function build() {
    return [
      '#type' => 'status_messages',
      '#include_fallback' => TRUE,
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function getCacheMaxAge() {
    // The messages are session-specific and hence aren't cacheable, but the
    // block itself *is* cacheable because it uses a #lazy_builder callback and
    // hence the block has a globally cacheable render array.
    return Cache::PERMANENT;
  }

}
