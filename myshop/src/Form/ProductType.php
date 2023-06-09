<?php

namespace App\Form;

use App\Entity\Product;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, [
            
                'label' => "Titre",
                'required' => true,
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez renseigner le titre du livre',
                    ]),
                ],
            ])
            ->add('description', TextType::class, [
            
                'label' => "description",
            ])

            ->add('price', MoneyType::class, [

                'label' => "Prix",
        
                'required' => true,
                'constraints' => [
                    new NotBlank ([
                        'message' => "Veuillez indiquer un prix au livre"
                    ])
                ]
                ])
            ->add('city', TextType::class, [
            
                'label' => "Ville",
                'required' => true,
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez renseigner la ville',
                    ]),
                ],
            ])
            ->add('reservationText', TextareaType::class, [
            
                'label' => "Texte de réservation",

            ])
            ->add('postalCode', NumberType::class, [
            
                'label' => "Code postal",
                'required' => true,
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez renseigner le code postal de la ville renseignée',
                    ]),
                ],
            ])
            ->add('image', FileType::class, [
                'label' => "Couverture de livre",
                'attr' => [
                    'accept' => "image/*",
                ],
    
                'mapped' => false,
    
                'required' => false,
    
                'help' => "Choisissez une couverture pour le livre",
    
                'constraints' => [
                    new File(
                        maxSize: '1024k',
                        maxSizeMessage: "le fichier est trop lourd ({{limit}} max)",
                        mimeTypes: ['image/gif', 'image/jpeg', 'image/png'],
                        mimeTypesMessage: 'Le format de fichier n\'est pas autorisé {{ types }}',
                    )
                    ]
    
    
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Product::class,
        ]);
    }
}
