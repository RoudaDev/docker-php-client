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
    class DistributionInspectNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;
        public function supportsDenormalization(mixed $data, string $type, string $format = null, array $context = []) : bool
        {
            return $type === 'Rouda\\Docker\\Api\\Model\\DistributionInspect';
        }
        public function supportsNormalization(mixed $data, string $format = null, array $context = []) : bool
        {
            return is_object($data) && get_class($data) === 'Rouda\\Docker\\Api\\Model\\DistributionInspect';
        }
        public function denormalize(mixed $data, string $type, string $format = null, array $context = []) : mixed
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new \Rouda\Docker\Api\Model\DistributionInspect();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('Descriptor', $data) && $data['Descriptor'] !== null) {
                $object->setDescriptor($this->denormalizer->denormalize($data['Descriptor'], 'Rouda\\Docker\\Api\\Model\\OCIDescriptor', 'json', $context));
            }
            elseif (\array_key_exists('Descriptor', $data) && $data['Descriptor'] === null) {
                $object->setDescriptor(null);
            }
            if (\array_key_exists('Platforms', $data) && $data['Platforms'] !== null) {
                $values = [];
                foreach ($data['Platforms'] as $value) {
                    $values[] = $this->denormalizer->denormalize($value, 'Rouda\\Docker\\Api\\Model\\OCIPlatform', 'json', $context);
                }
                $object->setPlatforms($values);
            }
            elseif (\array_key_exists('Platforms', $data) && $data['Platforms'] === null) {
                $object->setPlatforms(null);
            }
            return $object;
        }
        public function normalize(mixed $object, string $format = null, array $context = []) : array|string|int|float|bool|\ArrayObject|null
        {
            $data = [];
            $data['Descriptor'] = $this->normalizer->normalize($object->getDescriptor(), 'json', $context);
            $values = [];
            foreach ($object->getPlatforms() as $value) {
                $values[] = $this->normalizer->normalize($value, 'json', $context);
            }
            $data['Platforms'] = $values;
            return $data;
        }
        public function getSupportedTypes(?string $format = null) : array
        {
            return ['Rouda\\Docker\\Api\\Model\\DistributionInspect' => false];
        }
    }
} else {
    class DistributionInspectNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;
        public function supportsDenormalization($data, $type, string $format = null, array $context = []) : bool
        {
            return $type === 'Rouda\\Docker\\Api\\Model\\DistributionInspect';
        }
        public function supportsNormalization(mixed $data, string $format = null, array $context = []) : bool
        {
            return is_object($data) && get_class($data) === 'Rouda\\Docker\\Api\\Model\\DistributionInspect';
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
            $object = new \Rouda\Docker\Api\Model\DistributionInspect();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('Descriptor', $data) && $data['Descriptor'] !== null) {
                $object->setDescriptor($this->denormalizer->denormalize($data['Descriptor'], 'Rouda\\Docker\\Api\\Model\\OCIDescriptor', 'json', $context));
            }
            elseif (\array_key_exists('Descriptor', $data) && $data['Descriptor'] === null) {
                $object->setDescriptor(null);
            }
            if (\array_key_exists('Platforms', $data) && $data['Platforms'] !== null) {
                $values = [];
                foreach ($data['Platforms'] as $value) {
                    $values[] = $this->denormalizer->denormalize($value, 'Rouda\\Docker\\Api\\Model\\OCIPlatform', 'json', $context);
                }
                $object->setPlatforms($values);
            }
            elseif (\array_key_exists('Platforms', $data) && $data['Platforms'] === null) {
                $object->setPlatforms(null);
            }
            return $object;
        }
        /**
         * @return array|string|int|float|bool|\ArrayObject|null
         */
        public function normalize($object, $format = null, array $context = [])
        {
            $data = [];
            $data['Descriptor'] = $this->normalizer->normalize($object->getDescriptor(), 'json', $context);
            $values = [];
            foreach ($object->getPlatforms() as $value) {
                $values[] = $this->normalizer->normalize($value, 'json', $context);
            }
            $data['Platforms'] = $values;
            return $data;
        }
        public function getSupportedTypes(?string $format = null) : array
        {
            return ['Rouda\\Docker\\Api\\Model\\DistributionInspect' => false];
        }
    }
}