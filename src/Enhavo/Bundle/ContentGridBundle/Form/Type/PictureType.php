<?php
/**
 * PictureType.php
 *
 * @since 23/08/14
 * @author Gerhard Seidel <gseidel.message@googlemail.com>
 */

namespace enhavo\ContentBundle\Form\Type;

use enhavo\ContentBundle\Item\ItemFormType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PictureType extends ItemFormType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('title', 'text', array(
            'label' => 'form.label.title'
        ));

        $builder->add('files', 'enhavo_files', array(
            'label' => 'form.label.picture'
        ));

        $builder->add('caption', 'text', array(
            'label' => 'form.label.caption'
        ));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'enhavo\ContentBundle\Entity\Picture'
        ));
    }

    public function getName()
    {
        return 'enhavo_content_item_picture';
    }
} 