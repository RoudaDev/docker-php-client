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
    class MountVolumeOptionsNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;
        public function supportsDenormalization(mixed $data, string $type, string $format = null, array $context = []) : bool
        {
            return $type === 'Rouda\\Docker\\Api\\Model\\MountVolumeOptions';
        }
        public function supportsNormalization(mixed $data, string $format = null, array $context = []) : bool
        {
            return is_object($data) && get_class($data) === 'Rouda\\Docker\\Api\\Model\\MountVolumeOptions';
        }
        public function denormalize(mixed $data, string $type, string $format = null, array $context = []) : mixed
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new \Rouda\Docker\Api\Model\MountVolumeOptions();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('NoCopy', $data) && $data['NoCopy'] !== null) {
                $object->setNoCopy($data['NoCopy']);
            }
            elseif (\array_key_exists('NoCopy', $data) && $data['NoCopy'] === null) {
                $object->setNoCopy(null);
            }
            if (\array_key_exists('Labels', $data) && $data['Labels'] !== null) {
                $values = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
                foreach ($data['Labels'] as $key => $value) {
                    $values[$key] = $value;
                }
                $object->setLabels($values);
            }
            elseif (\array_key_exists('Labels', $data) && $data['Labels'] === null) {
                $object->setLabels(null);
            }
            if (\array_key_exists('DriverConfig', $data) && $data['DriverConfig'] !== null) {
                $object->setDriverConfig($this->denormalizer->denormalize($data['DriverConfig'], 'Rouda\\Docker\\Api\\Model\\MountVolumeOptionsDriverConfig', 'json', $context));
            }
            elseif (\array_key_exists('DriverConfig', $data) && $data['DriverConfig'] === null) {
                $object->setDriverConfig(null);
            }
            return $object;
        }
        public function normalize(mixed $object, string $format = null, array $context = []) : array|string|int|float|bool|\ArrayObject|null
        {
            $data = [];
            if ($object->isInitialized('noCopy') && null !== $object->getNoCopy()) {
                $data['NoCopy'] = $object->getNoCopy();
            }
            if ($object->isInitialized('labels') && null !== $object->getLabels()) {
                $values = [];
                foreach ($object->getLabels() as $key => $value) {
                    $values[$key] = $value;
                }
                $data['Labels'] = $values;
            }
            if ($object->isInitialized('driverConfig') && null !== $object->getDriverConfig()) {
                $data['DriverConfig'] = $this->normalizer->normalize($object->getDriverConfig(), 'json', $context);
            }
            return $data;
        }
        public function getSupportedTypes(?string $format = null) : array
        {
            return ['Rouda\\Docker\\Api\\Model\\MountVolumeOptions' => false];
        }
    }
} else {
    class MountVolumeOptionsNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;
        public function supportsDenormalization($data, $type, string $format = null, array $context = []) : bool
        {
            return $type === 'Rouda\\Docker\\Api\\Model\\MountVolumeOptions';
        }
        public function supportsNormalization(mixed $data, string $format = null, array $context = []) : bool
        {
            return is_object($data) && get_class($data) === 'Rouda\\Docker\\Api\\Model\\MountVolumeOptions';
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
            $object = new \Rouda\Docker\Api\Model\MountVolumeOptions();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('NoCopy', $data) && $data['NoCopy'] !== null) {
                $object->setNoCopy($data['NoCopy']);
            }
            elseif (\array_key_exists('NoCopy', $data) && $data['NoCopy'] === null) {
                $object->setNoCopy(null);
            }
            if (\array_key_exists('Labels', $data) && $data['Labels'] !== null) {
                $values = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
                foreach ($data['Labels'] as $key => $value) {
                    $values[$key] = $value;
                }
                $object->setLabels($values);
            }
            elseif (\array_key_exists('Labels', $data) && $data['Labels'] === null) {
                $object->setLabels(null);
            }
            if (\array_key_exists('DriverConfig', $data) && $data['DriverConfig'] !== null) {
                $object->setDriverConfig($this->denormalizer->denormalize($data['DriverConfig'], 'Rouda\\Docker\\Api\\Model\\MountVolumeOptionsDriverConfig', 'json', $context));
            }
            elseif (\array_key_exists('DriverConfig', $data) && $data['DriverConfig'] === null) {
                $object->setDriverConfig(null);
            }
            return $object;
        }
        /**
         * @return array|string|int|float|bool|\ArrayObject|null
         */
        public function normalize($object, $format = null, array $context = [])
        {
            $data = [];
            if ($object->isInitialized('noCopy') && null !== $object->getNoCopy()) {
                $data['NoCopy'] = $object->getNoCopy();
            }
            if ($object->isInitialized('labels') && null !== $object->getLabels()) {
                $values = [];
                foreach ($object->getLabels() as $key => $value) {
                    $values[$key] = $value;
                }
                $data['Labels'] = $values;
            }
            if ($object->isInitialized('driverConfig') && null !== $object->getDriverConfig()) {
                $data['DriverConfig'] = $this->normalizer->normalize($object->getDriverConfig(), 'json', $context);
            }
            return $data;
        }
        public function getSupportedTypes(?string $format = null) : array
        {
            return ['Rouda\\Docker\\Api\\Model\\MountVolumeOptions' => false];
        }
    }
}