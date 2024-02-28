<?php

namespace Rouda\Docker\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Rouda\Docker\Api\Runtime\Normalizer\CheckArray;
use Rouda\Docker\Api\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Exception\InvalidArgumentException;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\HttpKernel\Kernel;
if (!class_exists(Kernel::class) or (Kernel::MAJOR_VERSION >= 7 or Kernel::MAJOR_VERSION === 6 and Kernel::MINOR_VERSION === 4)) {
    class OCIDescriptorNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;
        public function supportsDenormalization(mixed $data, string $type, string $format = null, array $context = []) : bool
        {
            return $type === 'Rouda\\Docker\\Api\\Model\\OCIDescriptor';
        }
        public function supportsNormalization(mixed $data, string $format = null, array $context = []) : bool
        {
            return is_object($data) && get_class($data) === 'Rouda\\Docker\\Api\\Model\\OCIDescriptor';
        }
        public function denormalize(mixed $data, string $type, string $format = null, array $context = []) : mixed
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new \Rouda\Docker\Api\Model\OCIDescriptor();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('mediaType', $data) && $data['mediaType'] !== null) {
                $object->setMediaType($data['mediaType']);
            }
            elseif (\array_key_exists('mediaType', $data) && $data['mediaType'] === null) {
                $object->setMediaType(null);
            }
            if (\array_key_exists('digest', $data) && $data['digest'] !== null) {
                $object->setDigest($data['digest']);
            }
            elseif (\array_key_exists('digest', $data) && $data['digest'] === null) {
                $object->setDigest(null);
            }
            if (\array_key_exists('size', $data) && $data['size'] !== null) {
                $object->setSize($data['size']);
            }
            elseif (\array_key_exists('size', $data) && $data['size'] === null) {
                $object->setSize(null);
            }
            return $object;
        }
        public function normalize(mixed $object, string $format = null, array $context = []) : array|string|int|float|bool|\ArrayObject|null
        {
            $data = [];
            if ($object->isInitialized('mediaType') && null !== $object->getMediaType()) {
                $data['mediaType'] = $object->getMediaType();
            }
            if ($object->isInitialized('digest') && null !== $object->getDigest()) {
                $data['digest'] = $object->getDigest();
            }
            if ($object->isInitialized('size') && null !== $object->getSize()) {
                $data['size'] = $object->getSize();
            }
            return $data;
        }
        public function getSupportedTypes(?string $format = null) : array
        {
            return ['Rouda\\Docker\\Api\\Model\\OCIDescriptor' => false];
        }
    }
} else {
    class OCIDescriptorNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;
        public function supportsDenormalization($data, $type, string $format = null, array $context = []) : bool
        {
            return $type === 'Rouda\\Docker\\Api\\Model\\OCIDescriptor';
        }
        public function supportsNormalization(mixed $data, string $format = null, array $context = []) : bool
        {
            return is_object($data) && get_class($data) === 'Rouda\\Docker\\Api\\Model\\OCIDescriptor';
        }
        /**
         * @return mixed
         */
        public function denormalize($data, $type, $format = null, array $context = [])
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new \Rouda\Docker\Api\Model\OCIDescriptor();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('mediaType', $data) && $data['mediaType'] !== null) {
                $object->setMediaType($data['mediaType']);
            }
            elseif (\array_key_exists('mediaType', $data) && $data['mediaType'] === null) {
                $object->setMediaType(null);
            }
            if (\array_key_exists('digest', $data) && $data['digest'] !== null) {
                $object->setDigest($data['digest']);
            }
            elseif (\array_key_exists('digest', $data) && $data['digest'] === null) {
                $object->setDigest(null);
            }
            if (\array_key_exists('size', $data) && $data['size'] !== null) {
                $object->setSize($data['size']);
            }
            elseif (\array_key_exists('size', $data) && $data['size'] === null) {
                $object->setSize(null);
            }
            return $object;
        }
        /**
         * @return array|string|int|float|bool|\ArrayObject|null
         */
        public function normalize($object, $format = null, array $context = [])
        {
            $data = [];
            if ($object->isInitialized('mediaType') && null !== $object->getMediaType()) {
                $data['mediaType'] = $object->getMediaType();
            }
            if ($object->isInitialized('digest') && null !== $object->getDigest()) {
                $data['digest'] = $object->getDigest();
            }
            if ($object->isInitialized('size') && null !== $object->getSize()) {
                $data['size'] = $object->getSize();
            }
            return $data;
        }
        public function getSupportedTypes(?string $format = null) : array
        {
            return ['Rouda\\Docker\\Api\\Model\\OCIDescriptor' => false];
        }
    }
}