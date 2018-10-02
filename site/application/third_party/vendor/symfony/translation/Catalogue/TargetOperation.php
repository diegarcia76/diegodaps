<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Translation\Catalogue;

/**
 * Target operation between two catalogues:
 * intersection = source âˆ© target = {x: x âˆˆ source âˆ§ x âˆˆ target}
 * all = intersection âˆª (target âˆ– intersection) = target
 * new = all âˆ– source = {x: x âˆˆ target âˆ§ x âˆ‰ source}
 * obsolete = source âˆ– all = source âˆ– target = {x: x âˆˆ source âˆ§ x âˆ‰ target}
 * Basically, the result contains messages from the target catalogue. 
 *
 * @author Michael Lee <michael.lee@zerustech.com>
 */
class TargetOperation extends AbstractOperation
{
    /**
     * {@inheritdoc}
     */
    protected function processDomain($domain)
    {
        $this->messages[$domain] = array(
            'all' => array(),
            'new' => array(),
            'obsolete' => array(),
        );

        // For 'all' messages, the code can't be simplified as ``$this->messages[$domain]['all'] = $target->all($domain);``, 
        // because doing so will drop messages like {x: x âˆˆ source âˆ§ x âˆ‰ target.all âˆ§ x âˆˆ target.fallback}
        //
        // For 'new' messages, the code can't be simplied as ``array_diff_assoc($this->target->all($domain), $this->source->all($domain));``
        // because doing so will not exclude messages like {x: x âˆˆ target âˆ§ x âˆ‰ source.all âˆ§ x âˆˆ source.fallback}
        // 
        // For 'obsolete' messages, the code can't be simplifed as ``array_diff_assoc($this->source->all($domain), $this->target->all($domain))``
        // because doing so will not exclude messages like {x: x âˆˆ source âˆ§ x âˆ‰ target.all âˆ§ x âˆˆ target.fallback}
        
        foreach ($this->source->all($domain) as $id => $message) {
            if ($this->target->has($id, $domain)) {
                $this->messages[$domain]['all'][$id] = $message;
                $this->result->add(array($id => $message), $domain);
                if (null !== $keyMetadata = $this->source->getMetadata($id, $domain)) {
                    $this->result->setMetadata($id, $keyMetadata, $domain);
                }
            } else {
                $this->messages[$domain]['obsolete'][$id] = $message;
            }
        }

        foreach ($this->target->all($domain) as $id => $message) {
            if (!$this->source->has($id, $domain)) {
                $this->messages[$domain]['all'][$id] = $message;
                $this->messages[$domain]['new'][$id] = $message;
                $this->result->add(array($id => $message), $domain);
                if (null !== $keyMetadata = $this->target->getMetadata($id, $domain)) {
                    $this->result->setMetadata($id, $keyMetadata, $domain);
                }
            }
        }
    }
}
