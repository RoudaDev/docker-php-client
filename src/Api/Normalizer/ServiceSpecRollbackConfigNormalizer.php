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
    class ServiceSpecRollbackConfigNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;
        public function supportsDenormalization(mixed $data, string $type, string $format = null, array $context = []) : bool
        {
            return $type === 'Rouda\\Docker\\Api\\Model\\ServiceSpecRollbackConfig';
        }
        public function supportsNormalization(mixed $data, string $format = null, array $context = []) : bool
        {
            return is_object($data) && get_class($data) === 'Rouda\\Docker\\Api\\Model\\ServiceSpecRollbackConfig';
        }
        public function denormalize(mixed $data, string $type, string $format = null, array $context = []) : mixed
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new \Rouda\Docker\Api\Model\ServiceSpecRollbackConfig();
            if (\array_key_exists('MaxFailureRatio', $data) && \is_int($data['MaxFailureRatio'])) {
                $data['MaxFailureRatio'] = (double) $data['MaxFailureRatio'];
            }
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('Parallelism', $data) && $data['Parallelism'] !== null) {
                $object->setParallelism($data['Parallelism']);
            }
            elseif (\array_key_exists('Parallelism', $data) && $data['Parallelism'] === null) {
                $object->setParallelism(null);
            }
            if (\array_key_exists('Delay', $data) && $data['Delay'] !== null) {
                $object->setDelay($data['Delay']);
            }
            elseif (\array_key_exists('Delay', $data) && $data['Delay'] === null) {
                $object->setDelay(null);
            }
            if (\array_key_exists('FailureAction', $data) && $data['FailureAction'] !== null) {
                $object->setFailureAction($data['FailureAction']);
            }
            elseif (\array_key_exists('FailureAction', $data) && $data['FailureAction'] === null) {
                $object->setFailureAction(null);
            }
            if (\array_key_exists('Monitor', $data) && $data['Monitor'] !== null) {
                $object->setMonitor($data['Monitor']);
            }
            elseif (\array_key_exists('Monitor', $data) && $data['Monitor'] === null) {
                $object->setMonitor(null);
            }
            if (\array_key_exists('MaxFailureRatio', $data) && $data['MaxFailureRatio'] !== null) {
                $object->setMaxFailureRatio($data['MaxFailureRatio']);
            }
            elseif (\array_key_exists('MaxFailureRatio', $data) && $data['MaxFailureRatio'] === null) {
                $object->setMaxFailureRatio(null);
            }
            if (\array_key_exists('Order', $data) && $data['Order'] !== null) {
                $object->setOrder($data['Order']);
            }
            elseif (\array_key_exists('Order', $data) && $data['Order'] === null) {
                $object->setOrder(null);
            }
            return $object;
        }
        public function normalize(mixed $object, string $format = null, array $context = []) : array|string|int|float|bool|\ArrayObject|null
        {
            $data = [];
            if ($object->isInitialized('parallelism') && null !== $object->getParallelism()) {
                $data['Parallelism'] = $object->getParallelism();
            }
            if ($object->isInitialized('delay') && null !== $object->getDelay()) {
                $data['Delay'] = $object->getDelay();
            }
            if ($object->isInitialized('failureAction') && null !== $object->getFailureAction()) {
                $data['FailureAction'] = $object->getFailureAction();
            }
            if ($object->isInitialized('monitor') && null !== $object->getMonitor()) {
                $data['Monitor'] = $object->getMonitor();
            }
            if ($object->isInitialized('maxFailureRatio') && null !== $object->getMaxFailureRatio()) {
                $data['MaxFailureRatio'] = $object->getMaxFailureRatio();
            }
            if ($object->isInitialized('order') && null !== $object->getOrder()) {
                $data['Order'] = $object->getOrder();
            }
            return $data;
        }
        public function getSupportedTypes(?string $format = null) : array
        {
            return ['Rouda\\Docker\\Api\\Model\\ServiceSpecRollbackConfig' => false];
        }
    }
} else {
    class ServiceSpecRollbackConfigNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;
        public function supportsDenormalization($data, $type, string $format = null, array $context = []) : bool
        {
            return $type === 'Rouda\\Docker\\Api\\Model\\ServiceSpecRollbackConfig';
        }
        public function supportsNormalization(mixed $data, string $format = null, array $context = []) : bool
        {
            return is_object($data) && get_class($data) === 'Rouda\\Docker\\Api\\Model\\ServiceSpecRollbackConfig';
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
            $object = new \Rouda\Docker\Api\Model\ServiceSpecRollbackConfig();
            if (\array_key_exists('MaxFailureRatio', $data) && \is_int($data['MaxFailureRatio'])) {
                $data['MaxFailureRatio'] = (double) $data['MaxFailureRatio'];
            }
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('Parallelism', $data) && $data['Parallelism'] !== null) {
                $object->setParallelism($data['Parallelism']);
            }
            elseif (\array_key_exists('Parallelism', $data) && $data['Parallelism'] === null) {
                $object->setParallelism(null);
            }
            if (\array_key_exists('Delay', $data) && $data['Delay'] !== null) {
                $object->setDelay($data['Delay']);
            }
            elseif (\array_key_exists('Delay', $data) && $data['Delay'] === null) {
                $object->setDelay(null);
            }
            if (\array_key_exists('FailureAction', $data) && $data['FailureAction'] !== null) {
                $object->setFailureAction($data['FailureAction']);
            }
            elseif (\array_key_exists('FailureAction', $data) && $data['FailureAction'] === null) {
                $object->setFailureAction(null);
            }
            if (\array_key_exists('Monitor', $data) && $data['Monitor'] !== null) {
                $object->setMonitor($data['Monitor']);
            }
            elseif (\array_key_exists('Monitor', $data) && $data['Monitor'] === null) {
                $object->setMonitor(null);
            }
            if (\array_key_exists('MaxFailureRatio', $data) && $data['MaxFailureRatio'] !== null) {
                $object->setMaxFailureRatio($data['MaxFailureRatio']);
            }
            elseif (\array_key_exists('MaxFailureRatio', $data) && $data['MaxFailureRatio'] === null) {
                $object->setMaxFailureRatio(null);
            }
            if (\array_key_exists('Order', $data) && $data['Order'] !== null) {
                $object->setOrder($data['Order']);
            }
            elseif (\array_key_exists('Order', $data) && $data['Order'] === null) {
                $object->setOrder(null);
            }
            return $object;
        }
        /**
         * @return array|string|int|float|bool|\ArrayObject|null
         */
        public function normalize($object, $format = null, array $context = [])
        {
            $data = [];
            if ($object->isInitialized('parallelism') && null !== $object->getParallelism()) {
                $data['Parallelism'] = $object->getParallelism();
            }
            if ($object->isInitialized('delay') && null !== $object->getDelay()) {
                $data['Delay'] = $object->getDelay();
            }
            if ($object->isInitialized('failureAction') && null !== $object->getFailureAction()) {
                $data['FailureAction'] = $object->getFailureAction();
            }
            if ($object->isInitialized('monitor') && null !== $object->getMonitor()) {
                $data['Monitor'] = $object->getMonitor();
            }
            if ($object->isInitialized('maxFailureRatio') && null !== $object->getMaxFailureRatio()) {
                $data['MaxFailureRatio'] = $object->getMaxFailureRatio();
            }
            if ($object->isInitialized('order') && null !== $object->getOrder()) {
                $data['Order'] = $object->getOrder();
            }
            return $data;
        }
        public function getSupportedTypes(?string $format = null) : array
        {
            return ['Rouda\\Docker\\Api\\Model\\ServiceSpecRollbackConfig' => false];
        }
    }
}