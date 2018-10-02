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
 * Merge operation between two catalogues as follows:
 * all = source âˆª target = {x: x âˆˆ source âˆ¨ x âˆˆ target}
 * new = all âˆ– source = {x: x âˆˆ target âˆ§ x âˆ‰ source}
 * obsolete = source âˆ– all = {x: x âˆˆ source âˆ§ x âˆ‰ source âˆ§ x âˆ‰ target} = âˆ…
 * Basically, the result contains messages from both catalogues.
 *
 * @author Jean-FranÃ§ois Simon <contact@jfsimon.fr>
 */
class MergeOperation extends AbstractOperation
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

        foreach ($this->source->all($domain) as $id => $message) {
            $this->messages[$domain]['all'][$id] = $message;
            $this->result->add(array($id => $message), $domain);
            if (null !== $keyMetadata = $this->source->getMetadata($id, $domain)) {
                $this->result->setMetadata($id, $keyMetadata, $domain);
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
