<?php

namespace App\Serializer;

use App\Entity\Language;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Vich\UploaderBundle\Storage\StorageInterface;


final class FlagNormalizer implements NormalizerInterface, NormalizerAwareInterface
{
    use NormalizerAwareTrait;
    private const ALREADY_CALLED = 'LANGUAGE_NORMALIZER_ALREADY_CALLED';
    public function __construct(private StorageInterface $storage)
    {
    }
    public function normalize($object, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $object->imageUrl = $this->storage->resolveUri($object,'imageFile');
        $context[self::ALREADY_CALLED] = true;

        
        return $this->normalizer->normalize($object, $format, $context);
    }
    public function supportsNormalization($data, ?string $format = null, array $context = []): bool
    {
        if (isset($context[self::ALREADY_CALLED])) {
            return false;
        }
        return $data instanceof Language;
    }

    public function getSupportedTypes(): array
    {
        return [Language::class];
    }
}
