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
    class EventMessageNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;
        public function supportsDenormalization(mixed $data, string $type, string $format = null, array $context = []) : bool
        {
            return $type === 'Rouda\\Docker\\Api\\Model\\EventMessage';
        }
        public function supportsNormalization(mixed $data, string $format = null, array $context = []) : bool
        {
            return is_object($data) && get_class($data) === 'Rouda\\Docker\\Api\\Model\\EventMessage';
        }
        public function denormalize(mixed $data, string $type, string $format = null, array $context = []) : mixed
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new \Rouda\Docker\Api\Model\EventMessage();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('Type', $data) && $data['Type'] !== null) {
                $object->setType($data['Type']);
            }
            elseif (\array_key_exists('Type', $data) && $data['Type'] === null) {
                $object->setType(null);
            }
            if (\array_key_exists('Action', $data) && $data['Action'] !== null) {
                $object->setAction($data['Action']);
            }
            elseif (\array_key_exists('Action', $data) && $data['Action'] === null) {
                $object->setAction(null);
            }
            if (\array_key_exists('Actor', $data) && $data['Actor'] !== null) {
                $object->setActor($this->denormalizer->denormalize($data['Actor'], 'Rouda\\Docker\\Api\\Model\\EventActor', 'json', $context));
            }
            elseif (\array_key_exists('Actor', $data) && $data['Actor'] === null) {
                $object->setActor(null);
            }
            if (\array_key_exists('scope', $data) && $data['scope'] !== null) {
                $object->setScope($data['scope']);
            }
            elseif (\array_key_exists('scope', $data) && $data['scope'] === null) {
                $object->setScope(null);
            }
            if (\array_key_exists('time', $data) && $data['time'] !== null) {
                $object->setTime($data['time']);
            }
            elseif (\array_key_exists('time', $data) && $data['time'] === null) {
                $object->setTime(null);
            }
            if (\array_key_exists('timeNano', $data) && $data['timeNano'] !== null) {
                $object->setTimeNano($data['timeNano']);
            }
            elseif (\array_key_exists('timeNano', $data) && $data['timeNano'] === null) {
                $object->setTimeNano(null);
            }
            return $object;
        }
        public function normalize(mixed $object, string $format = null, array $context = []) : array|string|int|float|bool|\ArrayObject|null
        {
            $data = [];
            if ($object->isInitialized('type') && null !== $object->getType()) {
                $data['Type'] = $object->getType();
            }
            if ($object->isInitialized('action') && null !== $object->getAction()) {
                $data['Action'] = $object->getAction();
            }
            if ($object->isInitialized('actor') && null !== $object->getActor()) {
                $data['Actor'] = $this->normalizer->normalize($object->getActor(), 'json', $context);
            }
            if ($object->isInitialized('scope') && null !== $object->getScope()) {
                $data['scope'] = $object->getScope();
            }
            if ($object->isInitialized('time') && null !== $object->getTime()) {
                $data['time'] = $object->getTime();
            }
            if ($object->isInitialized('timeNano') && null !== $object->getTimeNano()) {
                $data['timeNano'] = $object->getTimeNano();
            }
            return $data;
        }
        public function getSupportedTypes(?string $format = null) : array
        {
            return ['Rouda\\Docker\\Api\\Model\\EventMessage' => false];
        }
    }
} else {
    class EventMessageNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;
        public function supportsDenormalization($data, $type, string $format = null, array $context = []) : bool
        {
            return $type === 'Rouda\\Docker\\Api\\Model\\EventMessage';
        }
        public function supportsNormalization(mixed $data, string $format = null, array $context = []) : bool
        {
            return is_object($data) && get_class($data) === 'Rouda\\Docker\\Api\\Model\\EventMessage';
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
            $object = new \Rouda\Docker\Api\Model\EventMessage();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('Type', $data) && $data['Type'] !== null) {
                $object->setType($data['Type']);
            }
            elseif (\array_key_exists('Type', $data) && $data['Type'] === null) {
                $object->setType(null);
            }
            if (\array_key_exists('Action', $data) && $data['Action'] !== null) {
                $object->setAction($data['Action']);
            }
            elseif (\array_key_exists('Action', $data) && $data['Action'] === null) {
                $object->setAction(null);
            }
            if (\array_key_exists('Actor', $data) && $data['Actor'] !== null) {
                $object->setActor($this->denormalizer->denormalize($data['Actor'], 'Rouda\\Docker\\Api\\Model\\EventActor', 'json', $context));
            }
            elseif (\array_key_exists('Actor', $data) && $data['Actor'] === null) {
                $object->setActor(null);
            }
            if (\array_key_exists('scope', $data) && $data['scope'] !== null) {
                $object->setScope($data['scope']);
            }
            elseif (\array_key_exists('scope', $data) && $data['scope'] === null) {
                $object->setScope(null);
            }
            if (\array_key_exists('time', $data) && $data['time'] !== null) {
                $object->setTime($data['time']);
            }
            elseif (\array_key_exists('time', $data) && $data['time'] === null) {
                $object->setTime(null);
            }
            if (\array_key_exists('timeNano', $data) && $data['timeNano'] !== null) {
                $object->setTimeNano($data['timeNano']);
            }
            elseif (\array_key_exists('timeNano', $data) && $data['timeNano'] === null) {
                $object->setTimeNano(null);
            }
            return $object;
        }
        /**
         * @return array|string|int|float|bool|\ArrayObject|null
         */
        public function normalize($object, $format = null, array $context = [])
        {
            $data = [];
            if ($object->isInitialized('type') && null !== $object->getType()) {
                $data['Type'] = $object->getType();
            }
            if ($object->isInitialized('action') && null !== $object->getAction()) {
                $data['Action'] = $object->getAction();
            }
            if ($object->isInitialized('actor') && null !== $object->getActor()) {
                $data['Actor'] = $this->normalizer->normalize($object->getActor(), 'json', $context);
            }
            if ($object->isInitialized('scope') && null !== $object->getScope()) {
                $data['scope'] = $object->getScope();
            }
            if ($object->isInitialized('time') && null !== $object->getTime()) {
                $data['time'] = $object->getTime();
            }
            if ($object->isInitialized('timeNano') && null !== $object->getTimeNano()) {
                $data['timeNano'] = $object->getTimeNano();
            }
            return $data;
        }
        public function getSupportedTypes(?string $format = null) : array
        {
            return ['Rouda\\Docker\\Api\\Model\\EventMessage' => false];
        }
    }
}