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
    class AddressNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;
        public function supportsDenormalization(mixed $data, string $type, string $format = null, array $context = []) : bool
        {
            return $type === 'Rouda\\Docker\\Api\\Model\\Address';
        }
        public function supportsNormalization(mixed $data, string $format = null, array $context = []) : bool
        {
            return is_object($data) && get_class($data) === 'Rouda\\Docker\\Api\\Model\\Address';
        }
        public function denormalize(mixed $data, string $type, string $format = null, array $context = []) : mixed
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new \Rouda\Docker\Api\Model\Address();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('Addr', $data) && $data['Addr'] !== null) {
                $object->setAddr($data['Addr']);
            }
            elseif (\array_key_exists('Addr', $data) && $data['Addr'] === null) {
                $object->setAddr(null);
            }
            if (\array_key_exists('PrefixLen', $data) && $data['PrefixLen'] !== null) {
                $object->setPrefixLen($data['PrefixLen']);
            }
            elseif (\array_key_exists('PrefixLen', $data) && $data['PrefixLen'] === null) {
                $object->setPrefixLen(null);
            }
            return $object;
        }
        public function normalize(mixed $object, string $format = null, array $context = []) : array|string|int|float|bool|\ArrayObject|null
        {
            $data = [];
            if ($object->isInitialized('addr') && null !== $object->getAddr()) {
                $data['Addr'] = $object->getAddr();
            }
            if ($object->isInitialized('prefixLen') && null !== $object->getPrefixLen()) {
                $data['PrefixLen'] = $object->getPrefixLen();
            }
            return $data;
        }
        public function getSupportedTypes(?string $format = null) : array
        {
            return ['Rouda\\Docker\\Api\\Model\\Address' => false];
        }
    }
} else {
    class AddressNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;
        public function supportsDenormalization($data, $type, string $format = null, array $context = []) : bool
        {
            return $type === 'Rouda\\Docker\\Api\\Model\\Address';
        }
        public function supportsNormalization(mixed $data, string $format = null, array $context = []) : bool
        {
            return is_object($data) && get_class($data) === 'Rouda\\Docker\\Api\\Model\\Address';
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
            $object = new \Rouda\Docker\Api\Model\Address();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('Addr', $data) && $data['Addr'] !== null) {
                $object->setAddr($data['Addr']);
            }
            elseif (\array_key_exists('Addr', $data) && $data['Addr'] === null) {
                $object->setAddr(null);
            }
            if (\array_key_exists('PrefixLen', $data) && $data['PrefixLen'] !== null) {
                $object->setPrefixLen($data['PrefixLen']);
            }
            elseif (\array_key_exists('PrefixLen', $data) && $data['PrefixLen'] === null) {
                $object->setPrefixLen(null);
            }
            return $object;
        }
        /**
         * @return array|string|int|float|bool|\ArrayObject|null
         */
        public function normalize($object, $format = null, array $context = [])
        {
            $data = [];
            if ($object->isInitialized('addr') && null !== $object->getAddr()) {
                $data['Addr'] = $object->getAddr();
            }
            if ($object->isInitialized('prefixLen') && null !== $object->getPrefixLen()) {
                $data['PrefixLen'] = $object->getPrefixLen();
            }
            return $data;
        }
        public function getSupportedTypes(?string $format = null) : array
        {
            return ['Rouda\\Docker\\Api\\Model\\Address' => false];
        }
    }
}