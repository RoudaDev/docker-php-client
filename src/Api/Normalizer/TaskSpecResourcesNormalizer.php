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
    class TaskSpecResourcesNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;
        public function supportsDenormalization(mixed $data, string $type, string $format = null, array $context = []) : bool
        {
            return $type === 'Rouda\\Docker\\Api\\Model\\TaskSpecResources';
        }
        public function supportsNormalization(mixed $data, string $format = null, array $context = []) : bool
        {
            return is_object($data) && get_class($data) === 'Rouda\\Docker\\Api\\Model\\TaskSpecResources';
        }
        public function denormalize(mixed $data, string $type, string $format = null, array $context = []) : mixed
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new \Rouda\Docker\Api\Model\TaskSpecResources();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('Limits', $data) && $data['Limits'] !== null) {
                $object->setLimits($this->denormalizer->denormalize($data['Limits'], 'Rouda\\Docker\\Api\\Model\\Limit', 'json', $context));
            }
            elseif (\array_key_exists('Limits', $data) && $data['Limits'] === null) {
                $object->setLimits(null);
            }
            if (\array_key_exists('Reservations', $data) && $data['Reservations'] !== null) {
                $object->setReservations($this->denormalizer->denormalize($data['Reservations'], 'Rouda\\Docker\\Api\\Model\\ResourceObject', 'json', $context));
            }
            elseif (\array_key_exists('Reservations', $data) && $data['Reservations'] === null) {
                $object->setReservations(null);
            }
            return $object;
        }
        public function normalize(mixed $object, string $format = null, array $context = []) : array|string|int|float|bool|\ArrayObject|null
        {
            $data = [];
            if ($object->isInitialized('limits') && null !== $object->getLimits()) {
                $data['Limits'] = $this->normalizer->normalize($object->getLimits(), 'json', $context);
            }
            if ($object->isInitialized('reservations') && null !== $object->getReservations()) {
                $data['Reservations'] = $this->normalizer->normalize($object->getReservations(), 'json', $context);
            }
            return $data;
        }
        public function getSupportedTypes(?string $format = null) : array
        {
            return ['Rouda\\Docker\\Api\\Model\\TaskSpecResources' => false];
        }
    }
} else {
    class TaskSpecResourcesNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;
        public function supportsDenormalization($data, $type, string $format = null, array $context = []) : bool
        {
            return $type === 'Rouda\\Docker\\Api\\Model\\TaskSpecResources';
        }
        public function supportsNormalization(mixed $data, string $format = null, array $context = []) : bool
        {
            return is_object($data) && get_class($data) === 'Rouda\\Docker\\Api\\Model\\TaskSpecResources';
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
            $object = new \Rouda\Docker\Api\Model\TaskSpecResources();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('Limits', $data) && $data['Limits'] !== null) {
                $object->setLimits($this->denormalizer->denormalize($data['Limits'], 'Rouda\\Docker\\Api\\Model\\Limit', 'json', $context));
            }
            elseif (\array_key_exists('Limits', $data) && $data['Limits'] === null) {
                $object->setLimits(null);
            }
            if (\array_key_exists('Reservations', $data) && $data['Reservations'] !== null) {
                $object->setReservations($this->denormalizer->denormalize($data['Reservations'], 'Rouda\\Docker\\Api\\Model\\ResourceObject', 'json', $context));
            }
            elseif (\array_key_exists('Reservations', $data) && $data['Reservations'] === null) {
                $object->setReservations(null);
            }
            return $object;
        }
        /**
         * @return array|string|int|float|bool|\ArrayObject|null
         */
        public function normalize($object, $format = null, array $context = [])
        {
            $data = [];
            if ($object->isInitialized('limits') && null !== $object->getLimits()) {
                $data['Limits'] = $this->normalizer->normalize($object->getLimits(), 'json', $context);
            }
            if ($object->isInitialized('reservations') && null !== $object->getReservations()) {
                $data['Reservations'] = $this->normalizer->normalize($object->getReservations(), 'json', $context);
            }
            return $data;
        }
        public function getSupportedTypes(?string $format = null) : array
        {
            return ['Rouda\\Docker\\Api\\Model\\TaskSpecResources' => false];
        }
    }
}