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
    class HealthNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;
        public function supportsDenormalization(mixed $data, string $type, string $format = null, array $context = []) : bool
        {
            return $type === 'Rouda\\Docker\\Api\\Model\\Health';
        }
        public function supportsNormalization(mixed $data, string $format = null, array $context = []) : bool
        {
            return is_object($data) && get_class($data) === 'Rouda\\Docker\\Api\\Model\\Health';
        }
        public function denormalize(mixed $data, string $type, string $format = null, array $context = []) : mixed
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new \Rouda\Docker\Api\Model\Health();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('Status', $data) && $data['Status'] !== null) {
                $object->setStatus($data['Status']);
            }
            elseif (\array_key_exists('Status', $data) && $data['Status'] === null) {
                $object->setStatus(null);
            }
            if (\array_key_exists('FailingStreak', $data) && $data['FailingStreak'] !== null) {
                $object->setFailingStreak($data['FailingStreak']);
            }
            elseif (\array_key_exists('FailingStreak', $data) && $data['FailingStreak'] === null) {
                $object->setFailingStreak(null);
            }
            if (\array_key_exists('Log', $data) && $data['Log'] !== null) {
                $values = [];
                foreach ($data['Log'] as $value) {
                    $values[] = $this->denormalizer->denormalize($value, 'Rouda\\Docker\\Api\\Model\\HealthcheckResult', 'json', $context);
                }
                $object->setLog($values);
            }
            elseif (\array_key_exists('Log', $data) && $data['Log'] === null) {
                $object->setLog(null);
            }
            return $object;
        }
        public function normalize(mixed $object, string $format = null, array $context = []) : array|string|int|float|bool|\ArrayObject|null
        {
            $data = [];
            if ($object->isInitialized('status') && null !== $object->getStatus()) {
                $data['Status'] = $object->getStatus();
            }
            if ($object->isInitialized('failingStreak') && null !== $object->getFailingStreak()) {
                $data['FailingStreak'] = $object->getFailingStreak();
            }
            if ($object->isInitialized('log') && null !== $object->getLog()) {
                $values = [];
                foreach ($object->getLog() as $value) {
                    $values[] = $this->normalizer->normalize($value, 'json', $context);
                }
                $data['Log'] = $values;
            }
            return $data;
        }
        public function getSupportedTypes(?string $format = null) : array
        {
            return ['Rouda\\Docker\\Api\\Model\\Health' => false];
        }
    }
} else {
    class HealthNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;
        public function supportsDenormalization($data, $type, string $format = null, array $context = []) : bool
        {
            return $type === 'Rouda\\Docker\\Api\\Model\\Health';
        }
        public function supportsNormalization(mixed $data, string $format = null, array $context = []) : bool
        {
            return is_object($data) && get_class($data) === 'Rouda\\Docker\\Api\\Model\\Health';
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
            $object = new \Rouda\Docker\Api\Model\Health();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('Status', $data) && $data['Status'] !== null) {
                $object->setStatus($data['Status']);
            }
            elseif (\array_key_exists('Status', $data) && $data['Status'] === null) {
                $object->setStatus(null);
            }
            if (\array_key_exists('FailingStreak', $data) && $data['FailingStreak'] !== null) {
                $object->setFailingStreak($data['FailingStreak']);
            }
            elseif (\array_key_exists('FailingStreak', $data) && $data['FailingStreak'] === null) {
                $object->setFailingStreak(null);
            }
            if (\array_key_exists('Log', $data) && $data['Log'] !== null) {
                $values = [];
                foreach ($data['Log'] as $value) {
                    $values[] = $this->denormalizer->denormalize($value, 'Rouda\\Docker\\Api\\Model\\HealthcheckResult', 'json', $context);
                }
                $object->setLog($values);
            }
            elseif (\array_key_exists('Log', $data) && $data['Log'] === null) {
                $object->setLog(null);
            }
            return $object;
        }
        /**
         * @return array|string|int|float|bool|\ArrayObject|null
         */
        public function normalize($object, $format = null, array $context = [])
        {
            $data = [];
            if ($object->isInitialized('status') && null !== $object->getStatus()) {
                $data['Status'] = $object->getStatus();
            }
            if ($object->isInitialized('failingStreak') && null !== $object->getFailingStreak()) {
                $data['FailingStreak'] = $object->getFailingStreak();
            }
            if ($object->isInitialized('log') && null !== $object->getLog()) {
                $values = [];
                foreach ($object->getLog() as $value) {
                    $values[] = $this->normalizer->normalize($value, 'json', $context);
                }
                $data['Log'] = $values;
            }
            return $data;
        }
        public function getSupportedTypes(?string $format = null) : array
        {
            return ['Rouda\\Docker\\Api\\Model\\Health' => false];
        }
    }
}