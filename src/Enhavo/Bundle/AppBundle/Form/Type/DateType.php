<?php
/**
 * Created by PhpStorm.
 * User: gseidel
 * Date: 29/05/16
 */

namespace Enhavo\Bundle\AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DateType extends AbstractType
{
    public function getName()
    {
        return 'enhavo_date';
    }

    public function getParent()
    {
        return 'date';
    }

    /**
     * Configures the options for this type.
     *
     * @param OptionsResolver $resolver The resolver for the options.
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'widget' => 'single_text',
            'format' => 'dd.MM.yyyy',
        ));
    }
} 