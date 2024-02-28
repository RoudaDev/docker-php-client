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
    class ServiceSpecModeNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;
        public function supportsDenormalization(mixed $data, string $type, string $format = null, array $context = []) : bool
        {
            return $type === 'Rouda\\Docker\\Api\\Model\\ServiceSpecMode';
        }
        public function supportsNormalization(mixed $data, string $format = null, array $context = []) : bool
        {
            return is_object($data) && get_class($data) === 'Rouda\\Docker\\Api\\Model\\ServiceSpecMode';
        }
        public function denormalize(mixed $data, string $type, string $format = null, array $context = []) : mixed
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new \Rouda\Docker\Api\Model\ServiceSpecMode();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('Replicated', $data) && $data['Replicated'] !== null) {
                $object->setReplicated($this->denormalizer->denormalize($data['Replicated'], 'Rouda\\Docker\\Api\\Model\\ServiceSpecModeReplicated', 'json', $context));
            }
            elseif (\array_key_exists('Replicated', $data) && $data['Replicated'] === null) {
                $object->setReplicated(null);
            }
            if (\array_key_exists('Global', $data) && $data['Global'] !== null) {
                $object->setGlobal($data['Global']);
            }
            elseif (\array_key_exists('Global', $data) && $data['Global'] === null) {
                $object->setGlobal(null);
            }
            if (\array_key_exists('ReplicatedJob', $data) && $data['ReplicatedJob'] !== null) {
                $object->setReplicatedJob($this->denormalizer->denormalize($data['ReplicatedJob'], 'Rouda\\Docker\\Api\\Model\\ServiceSpecModeReplicatedJob', 'json', $context));
            }
            elseif (\array_key_exists('ReplicatedJob', $data) && $data['ReplicatedJob'] === null) {
                $object->setReplicatedJob(null);
            }
            if (\array_key_exists('GlobalJob', $data) && $data['GlobalJob'] !== null) {
                $object->setGlobalJob($data['GlobalJob']);
            }
            elseif (\array_key_exists('GlobalJob', $data) && $data['GlobalJob'] === null) {
                $object->setGlobalJob(null);
            }
            return $object;
        }
        public function normalize(mixed $object, string $format = null, array $context = []) : array|string|int|float|bool|\ArrayObject|null
        {
            $data = [];
            if ($object->isInitialized('replicated') && null !== $object->getReplicated()) {
                $data['Replicated'] = $this->normalizer->normalize($object->getReplicated(), 'json', $context);
            }
            if ($object->isInitialized('global') && null !== $object->getGlobal()) {
                $data['Global'] = $object->getGlobal();
            }
            if ($object->isInitialized('replicatedJob') && null !== $object->getReplicatedJob()) {
                $data['ReplicatedJob'] = $this->normalizer->normalize($object->getReplicatedJob(), 'json', $context);
            }
            if ($object->isInitialized('globalJob') && null !== $object->getGlobalJob()) {
                $data['GlobalJob'] = $object->getGlobalJob();
            }
            return $data;
        }
        public function getSupportedTypes(?string $format = null) : array
        {
            return ['Rouda\\Docker\\Api\\Model\\ServiceSpecMode' => false];
        }
    }
} else {
    class ServiceSpecModeNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;
        public function supportsDenormalization($data, $type, string $format = null, array $context = []) : bool
        {
            return $type === 'Rouda\\Docker\\Api\\Model\\ServiceSpecMode';
        }
        public function supportsNormalization(mixed $data, string $format = null, array $context = []) : bool
        {
            return is_object($data) && get_class($data) === 'Rouda\\Docker\\Api\\Model\\ServiceSpecMode';
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
            $object = new \Rouda\Docker\Api\Model\ServiceSpecMode();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('Replicated', $data) && $data['Replicated'] !== null) {
                $object->setReplicated($this->denormalizer->denormalize($data['Replicated'], 'Rouda\\Docker\\Api\\Model\\ServiceSpecModeReplicated', 'json', $context));
            }
            elseif (\array_key_exists('Replicated', $data) && $data['Replicated'] === null) {
                $object->setReplicated(null);
            }
            if (\array_key_exists('Global', $data) && $data['Global'] !== null) {
                $object->setGlobal($data['Global']);
            }
            elseif (\array_key_exists('Global', $data) && $data['Global'] === null) {
                $object->setGlobal(null);
            }
            if (\array_key_exists('ReplicatedJob', $data) && $data['ReplicatedJob'] !== null) {
                $object->setReplicatedJob($this->denormalizer->denormalize($data['ReplicatedJob'], 'Rouda\\Docker\\Api\\Model\\ServiceSpecModeReplicatedJob', 'json', $context));
            }
            elseif (\array_key_exists('ReplicatedJob', $data) && $data['ReplicatedJob'] === null) {
                $object->setReplicatedJob(null);
            }
            if (\array_key_exists('GlobalJob', $data) && $data['GlobalJob'] !== null) {
                $object->setGlobalJob($data['GlobalJob']);
            }
            elseif (\array_key_exists('GlobalJob', $data) && $data['GlobalJob'] === null) {
                $object->setGlobalJob(null);
            }
            return $object;
        }
        /**
         * @return array|string|int|float|bool|\ArrayObject|null
         */
        public function normalize($object, $format = null, array $context = [])
        {
            $data = [];
            if ($object->isInitialized('replicated') && null !== $object->getReplicated()) {
                $data['Replicated'] = $this->normalizer->normalize($object->getReplicated(), 'json', $context);
            }
            if ($object->isInitialized('global') && null !== $object->getGlobal()) {
                $data['Global'] = $object->getGlobal();
            }
            if ($object->isInitialized('replicatedJob') && null !== $object->getReplicatedJob()) {
                $data['ReplicatedJob'] = $this->normalizer->normalize($object->getReplicatedJob(), 'json', $context);
            }
            if ($object->isInitialized('globalJob') && null !== $object->getGlobalJob()) {
                $data['GlobalJob'] = $object->getGlobalJob();
            }
            return $data;
        }
        public function getSupportedTypes(?string $format = null) : array
        {
            return ['Rouda\\Docker\\Api\\Model\\ServiceSpecMode' => false];
        }
    }
}