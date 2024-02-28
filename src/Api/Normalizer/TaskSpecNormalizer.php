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
    class TaskSpecNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;
        public function supportsDenormalization(mixed $data, string $type, string $format = null, array $context = []) : bool
        {
            return $type === 'Rouda\\Docker\\Api\\Model\\TaskSpec';
        }
        public function supportsNormalization(mixed $data, string $format = null, array $context = []) : bool
        {
            return is_object($data) && get_class($data) === 'Rouda\\Docker\\Api\\Model\\TaskSpec';
        }
        public function denormalize(mixed $data, string $type, string $format = null, array $context = []) : mixed
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new \Rouda\Docker\Api\Model\TaskSpec();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('PluginSpec', $data) && $data['PluginSpec'] !== null) {
                $object->setPluginSpec($this->denormalizer->denormalize($data['PluginSpec'], 'Rouda\\Docker\\Api\\Model\\TaskSpecPluginSpec', 'json', $context));
            }
            elseif (\array_key_exists('PluginSpec', $data) && $data['PluginSpec'] === null) {
                $object->setPluginSpec(null);
            }
            if (\array_key_exists('ContainerSpec', $data) && $data['ContainerSpec'] !== null) {
                $object->setContainerSpec($this->denormalizer->denormalize($data['ContainerSpec'], 'Rouda\\Docker\\Api\\Model\\TaskSpecContainerSpec', 'json', $context));
            }
            elseif (\array_key_exists('ContainerSpec', $data) && $data['ContainerSpec'] === null) {
                $object->setContainerSpec(null);
            }
            if (\array_key_exists('NetworkAttachmentSpec', $data) && $data['NetworkAttachmentSpec'] !== null) {
                $object->setNetworkAttachmentSpec($this->denormalizer->denormalize($data['NetworkAttachmentSpec'], 'Rouda\\Docker\\Api\\Model\\TaskSpecNetworkAttachmentSpec', 'json', $context));
            }
            elseif (\array_key_exists('NetworkAttachmentSpec', $data) && $data['NetworkAttachmentSpec'] === null) {
                $object->setNetworkAttachmentSpec(null);
            }
            if (\array_key_exists('Resources', $data) && $data['Resources'] !== null) {
                $object->setResources($this->denormalizer->denormalize($data['Resources'], 'Rouda\\Docker\\Api\\Model\\TaskSpecResources', 'json', $context));
            }
            elseif (\array_key_exists('Resources', $data) && $data['Resources'] === null) {
                $object->setResources(null);
            }
            if (\array_key_exists('RestartPolicy', $data) && $data['RestartPolicy'] !== null) {
                $object->setRestartPolicy($this->denormalizer->denormalize($data['RestartPolicy'], 'Rouda\\Docker\\Api\\Model\\TaskSpecRestartPolicy', 'json', $context));
            }
            elseif (\array_key_exists('RestartPolicy', $data) && $data['RestartPolicy'] === null) {
                $object->setRestartPolicy(null);
            }
            if (\array_key_exists('Placement', $data) && $data['Placement'] !== null) {
                $object->setPlacement($this->denormalizer->denormalize($data['Placement'], 'Rouda\\Docker\\Api\\Model\\TaskSpecPlacement', 'json', $context));
            }
            elseif (\array_key_exists('Placement', $data) && $data['Placement'] === null) {
                $object->setPlacement(null);
            }
            if (\array_key_exists('ForceUpdate', $data) && $data['ForceUpdate'] !== null) {
                $object->setForceUpdate($data['ForceUpdate']);
            }
            elseif (\array_key_exists('ForceUpdate', $data) && $data['ForceUpdate'] === null) {
                $object->setForceUpdate(null);
            }
            if (\array_key_exists('Runtime', $data) && $data['Runtime'] !== null) {
                $object->setRuntime($data['Runtime']);
            }
            elseif (\array_key_exists('Runtime', $data) && $data['Runtime'] === null) {
                $object->setRuntime(null);
            }
            if (\array_key_exists('Networks', $data) && $data['Networks'] !== null) {
                $values = [];
                foreach ($data['Networks'] as $value) {
                    $values[] = $this->denormalizer->denormalize($value, 'Rouda\\Docker\\Api\\Model\\NetworkAttachmentConfig', 'json', $context);
                }
                $object->setNetworks($values);
            }
            elseif (\array_key_exists('Networks', $data) && $data['Networks'] === null) {
                $object->setNetworks(null);
            }
            if (\array_key_exists('LogDriver', $data) && $data['LogDriver'] !== null) {
                $object->setLogDriver($this->denormalizer->denormalize($data['LogDriver'], 'Rouda\\Docker\\Api\\Model\\TaskSpecLogDriver', 'json', $context));
            }
            elseif (\array_key_exists('LogDriver', $data) && $data['LogDriver'] === null) {
                $object->setLogDriver(null);
            }
            return $object;
        }
        public function normalize(mixed $object, string $format = null, array $context = []) : array|string|int|float|bool|\ArrayObject|null
        {
            $data = [];
            if ($object->isInitialized('pluginSpec') && null !== $object->getPluginSpec()) {
                $data['PluginSpec'] = $this->normalizer->normalize($object->getPluginSpec(), 'json', $context);
            }
            if ($object->isInitialized('containerSpec') && null !== $object->getContainerSpec()) {
                $data['ContainerSpec'] = $this->normalizer->normalize($object->getContainerSpec(), 'json', $context);
            }
            if ($object->isInitialized('networkAttachmentSpec') && null !== $object->getNetworkAttachmentSpec()) {
                $data['NetworkAttachmentSpec'] = $this->normalizer->normalize($object->getNetworkAttachmentSpec(), 'json', $context);
            }
            if ($object->isInitialized('resources') && null !== $object->getResources()) {
                $data['Resources'] = $this->normalizer->normalize($object->getResources(), 'json', $context);
            }
            if ($object->isInitialized('restartPolicy') && null !== $object->getRestartPolicy()) {
                $data['RestartPolicy'] = $this->normalizer->normalize($object->getRestartPolicy(), 'json', $context);
            }
            if ($object->isInitialized('placement') && null !== $object->getPlacement()) {
                $data['Placement'] = $this->normalizer->normalize($object->getPlacement(), 'json', $context);
            }
            if ($object->isInitialized('forceUpdate') && null !== $object->getForceUpdate()) {
                $data['ForceUpdate'] = $object->getForceUpdate();
            }
            if ($object->isInitialized('runtime') && null !== $object->getRuntime()) {
                $data['Runtime'] = $object->getRuntime();
            }
            if ($object->isInitialized('networks') && null !== $object->getNetworks()) {
                $values = [];
                foreach ($object->getNetworks() as $value) {
                    $values[] = $this->normalizer->normalize($value, 'json', $context);
                }
                $data['Networks'] = $values;
            }
            if ($object->isInitialized('logDriver') && null !== $object->getLogDriver()) {
                $data['LogDriver'] = $this->normalizer->normalize($object->getLogDriver(), 'json', $context);
            }
            return $data;
        }
        public function getSupportedTypes(?string $format = null) : array
        {
            return ['Rouda\\Docker\\Api\\Model\\TaskSpec' => false];
        }
    }
} else {
    class TaskSpecNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;
        public function supportsDenormalization($data, $type, string $format = null, array $context = []) : bool
        {
            return $type === 'Rouda\\Docker\\Api\\Model\\TaskSpec';
        }
        public function supportsNormalization(mixed $data, string $format = null, array $context = []) : bool
        {
            return is_object($data) && get_class($data) === 'Rouda\\Docker\\Api\\Model\\TaskSpec';
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
            $object = new \Rouda\Docker\Api\Model\TaskSpec();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('PluginSpec', $data) && $data['PluginSpec'] !== null) {
                $object->setPluginSpec($this->denormalizer->denormalize($data['PluginSpec'], 'Rouda\\Docker\\Api\\Model\\TaskSpecPluginSpec', 'json', $context));
            }
            elseif (\array_key_exists('PluginSpec', $data) && $data['PluginSpec'] === null) {
                $object->setPluginSpec(null);
            }
            if (\array_key_exists('ContainerSpec', $data) && $data['ContainerSpec'] !== null) {
                $object->setContainerSpec($this->denormalizer->denormalize($data['ContainerSpec'], 'Rouda\\Docker\\Api\\Model\\TaskSpecContainerSpec', 'json', $context));
            }
            elseif (\array_key_exists('ContainerSpec', $data) && $data['ContainerSpec'] === null) {
                $object->setContainerSpec(null);
            }
            if (\array_key_exists('NetworkAttachmentSpec', $data) && $data['NetworkAttachmentSpec'] !== null) {
                $object->setNetworkAttachmentSpec($this->denormalizer->denormalize($data['NetworkAttachmentSpec'], 'Rouda\\Docker\\Api\\Model\\TaskSpecNetworkAttachmentSpec', 'json', $context));
            }
            elseif (\array_key_exists('NetworkAttachmentSpec', $data) && $data['NetworkAttachmentSpec'] === null) {
                $object->setNetworkAttachmentSpec(null);
            }
            if (\array_key_exists('Resources', $data) && $data['Resources'] !== null) {
                $object->setResources($this->denormalizer->denormalize($data['Resources'], 'Rouda\\Docker\\Api\\Model\\TaskSpecResources', 'json', $context));
            }
            elseif (\array_key_exists('Resources', $data) && $data['Resources'] === null) {
                $object->setResources(null);
            }
            if (\array_key_exists('RestartPolicy', $data) && $data['RestartPolicy'] !== null) {
                $object->setRestartPolicy($this->denormalizer->denormalize($data['RestartPolicy'], 'Rouda\\Docker\\Api\\Model\\TaskSpecRestartPolicy', 'json', $context));
            }
            elseif (\array_key_exists('RestartPolicy', $data) && $data['RestartPolicy'] === null) {
                $object->setRestartPolicy(null);
            }
            if (\array_key_exists('Placement', $data) && $data['Placement'] !== null) {
                $object->setPlacement($this->denormalizer->denormalize($data['Placement'], 'Rouda\\Docker\\Api\\Model\\TaskSpecPlacement', 'json', $context));
            }
            elseif (\array_key_exists('Placement', $data) && $data['Placement'] === null) {
                $object->setPlacement(null);
            }
            if (\array_key_exists('ForceUpdate', $data) && $data['ForceUpdate'] !== null) {
                $object->setForceUpdate($data['ForceUpdate']);
            }
            elseif (\array_key_exists('ForceUpdate', $data) && $data['ForceUpdate'] === null) {
                $object->setForceUpdate(null);
            }
            if (\array_key_exists('Runtime', $data) && $data['Runtime'] !== null) {
                $object->setRuntime($data['Runtime']);
            }
            elseif (\array_key_exists('Runtime', $data) && $data['Runtime'] === null) {
                $object->setRuntime(null);
            }
            if (\array_key_exists('Networks', $data) && $data['Networks'] !== null) {
                $values = [];
                foreach ($data['Networks'] as $value) {
                    $values[] = $this->denormalizer->denormalize($value, 'Rouda\\Docker\\Api\\Model\\NetworkAttachmentConfig', 'json', $context);
                }
                $object->setNetworks($values);
            }
            elseif (\array_key_exists('Networks', $data) && $data['Networks'] === null) {
                $object->setNetworks(null);
            }
            if (\array_key_exists('LogDriver', $data) && $data['LogDriver'] !== null) {
                $object->setLogDriver($this->denormalizer->denormalize($data['LogDriver'], 'Rouda\\Docker\\Api\\Model\\TaskSpecLogDriver', 'json', $context));
            }
            elseif (\array_key_exists('LogDriver', $data) && $data['LogDriver'] === null) {
                $object->setLogDriver(null);
            }
            return $object;
        }
        /**
         * @return array|string|int|float|bool|\ArrayObject|null
         */
        public function normalize($object, $format = null, array $context = [])
        {
            $data = [];
            if ($object->isInitialized('pluginSpec') && null !== $object->getPluginSpec()) {
                $data['PluginSpec'] = $this->normalizer->normalize($object->getPluginSpec(), 'json', $context);
            }
            if ($object->isInitialized('containerSpec') && null !== $object->getContainerSpec()) {
                $data['ContainerSpec'] = $this->normalizer->normalize($object->getContainerSpec(), 'json', $context);
            }
            if ($object->isInitialized('networkAttachmentSpec') && null !== $object->getNetworkAttachmentSpec()) {
                $data['NetworkAttachmentSpec'] = $this->normalizer->normalize($object->getNetworkAttachmentSpec(), 'json', $context);
            }
            if ($object->isInitialized('resources') && null !== $object->getResources()) {
                $data['Resources'] = $this->normalizer->normalize($object->getResources(), 'json', $context);
            }
            if ($object->isInitialized('restartPolicy') && null !== $object->getRestartPolicy()) {
                $data['RestartPolicy'] = $this->normalizer->normalize($object->getRestartPolicy(), 'json', $context);
            }
            if ($object->isInitialized('placement') && null !== $object->getPlacement()) {
                $data['Placement'] = $this->normalizer->normalize($object->getPlacement(), 'json', $context);
            }
            if ($object->isInitialized('forceUpdate') && null !== $object->getForceUpdate()) {
                $data['ForceUpdate'] = $object->getForceUpdate();
            }
            if ($object->isInitialized('runtime') && null !== $object->getRuntime()) {
                $data['Runtime'] = $object->getRuntime();
            }
            if ($object->isInitialized('networks') && null !== $object->getNetworks()) {
                $values = [];
                foreach ($object->getNetworks() as $value) {
                    $values[] = $this->normalizer->normalize($value, 'json', $context);
                }
                $data['Networks'] = $values;
            }
            if ($object->isInitialized('logDriver') && null !== $object->getLogDriver()) {
                $data['LogDriver'] = $this->normalizer->normalize($object->getLogDriver(), 'json', $context);
            }
            return $data;
        }
        public function getSupportedTypes(?string $format = null) : array
        {
            return ['Rouda\\Docker\\Api\\Model\\TaskSpec' => false];
        }
    }
}