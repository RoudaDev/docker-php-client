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
    class PluginConfigNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;
        public function supportsDenormalization(mixed $data, string $type, string $format = null, array $context = []) : bool
        {
            return $type === 'Rouda\\Docker\\Api\\Model\\PluginConfig';
        }
        public function supportsNormalization(mixed $data, string $format = null, array $context = []) : bool
        {
            return is_object($data) && get_class($data) === 'Rouda\\Docker\\Api\\Model\\PluginConfig';
        }
        public function denormalize(mixed $data, string $type, string $format = null, array $context = []) : mixed
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new \Rouda\Docker\Api\Model\PluginConfig();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('DockerVersion', $data) && $data['DockerVersion'] !== null) {
                $object->setDockerVersion($data['DockerVersion']);
            }
            elseif (\array_key_exists('DockerVersion', $data) && $data['DockerVersion'] === null) {
                $object->setDockerVersion(null);
            }
            if (\array_key_exists('Description', $data) && $data['Description'] !== null) {
                $object->setDescription($data['Description']);
            }
            elseif (\array_key_exists('Description', $data) && $data['Description'] === null) {
                $object->setDescription(null);
            }
            if (\array_key_exists('Documentation', $data) && $data['Documentation'] !== null) {
                $object->setDocumentation($data['Documentation']);
            }
            elseif (\array_key_exists('Documentation', $data) && $data['Documentation'] === null) {
                $object->setDocumentation(null);
            }
            if (\array_key_exists('Interface', $data) && $data['Interface'] !== null) {
                $object->setInterface($this->denormalizer->denormalize($data['Interface'], 'Rouda\\Docker\\Api\\Model\\PluginConfigInterface', 'json', $context));
            }
            elseif (\array_key_exists('Interface', $data) && $data['Interface'] === null) {
                $object->setInterface(null);
            }
            if (\array_key_exists('Entrypoint', $data) && $data['Entrypoint'] !== null) {
                $values = [];
                foreach ($data['Entrypoint'] as $value) {
                    $values[] = $value;
                }
                $object->setEntrypoint($values);
            }
            elseif (\array_key_exists('Entrypoint', $data) && $data['Entrypoint'] === null) {
                $object->setEntrypoint(null);
            }
            if (\array_key_exists('WorkDir', $data) && $data['WorkDir'] !== null) {
                $object->setWorkDir($data['WorkDir']);
            }
            elseif (\array_key_exists('WorkDir', $data) && $data['WorkDir'] === null) {
                $object->setWorkDir(null);
            }
            if (\array_key_exists('User', $data) && $data['User'] !== null) {
                $object->setUser($this->denormalizer->denormalize($data['User'], 'Rouda\\Docker\\Api\\Model\\PluginConfigUser', 'json', $context));
            }
            elseif (\array_key_exists('User', $data) && $data['User'] === null) {
                $object->setUser(null);
            }
            if (\array_key_exists('Network', $data) && $data['Network'] !== null) {
                $object->setNetwork($this->denormalizer->denormalize($data['Network'], 'Rouda\\Docker\\Api\\Model\\PluginConfigNetwork', 'json', $context));
            }
            elseif (\array_key_exists('Network', $data) && $data['Network'] === null) {
                $object->setNetwork(null);
            }
            if (\array_key_exists('Linux', $data) && $data['Linux'] !== null) {
                $object->setLinux($this->denormalizer->denormalize($data['Linux'], 'Rouda\\Docker\\Api\\Model\\PluginConfigLinux', 'json', $context));
            }
            elseif (\array_key_exists('Linux', $data) && $data['Linux'] === null) {
                $object->setLinux(null);
            }
            if (\array_key_exists('PropagatedMount', $data) && $data['PropagatedMount'] !== null) {
                $object->setPropagatedMount($data['PropagatedMount']);
            }
            elseif (\array_key_exists('PropagatedMount', $data) && $data['PropagatedMount'] === null) {
                $object->setPropagatedMount(null);
            }
            if (\array_key_exists('IpcHost', $data) && $data['IpcHost'] !== null) {
                $object->setIpcHost($data['IpcHost']);
            }
            elseif (\array_key_exists('IpcHost', $data) && $data['IpcHost'] === null) {
                $object->setIpcHost(null);
            }
            if (\array_key_exists('PidHost', $data) && $data['PidHost'] !== null) {
                $object->setPidHost($data['PidHost']);
            }
            elseif (\array_key_exists('PidHost', $data) && $data['PidHost'] === null) {
                $object->setPidHost(null);
            }
            if (\array_key_exists('Mounts', $data) && $data['Mounts'] !== null) {
                $values_1 = [];
                foreach ($data['Mounts'] as $value_1) {
                    $values_1[] = $this->denormalizer->denormalize($value_1, 'Rouda\\Docker\\Api\\Model\\PluginMount', 'json', $context);
                }
                $object->setMounts($values_1);
            }
            elseif (\array_key_exists('Mounts', $data) && $data['Mounts'] === null) {
                $object->setMounts(null);
            }
            if (\array_key_exists('Env', $data) && $data['Env'] !== null) {
                $values_2 = [];
                foreach ($data['Env'] as $value_2) {
                    $values_2[] = $this->denormalizer->denormalize($value_2, 'Rouda\\Docker\\Api\\Model\\PluginEnv', 'json', $context);
                }
                $object->setEnv($values_2);
            }
            elseif (\array_key_exists('Env', $data) && $data['Env'] === null) {
                $object->setEnv(null);
            }
            if (\array_key_exists('Args', $data) && $data['Args'] !== null) {
                $object->setArgs($this->denormalizer->denormalize($data['Args'], 'Rouda\\Docker\\Api\\Model\\PluginConfigArgs', 'json', $context));
            }
            elseif (\array_key_exists('Args', $data) && $data['Args'] === null) {
                $object->setArgs(null);
            }
            if (\array_key_exists('rootfs', $data) && $data['rootfs'] !== null) {
                $object->setRootfs($this->denormalizer->denormalize($data['rootfs'], 'Rouda\\Docker\\Api\\Model\\PluginConfigRootfs', 'json', $context));
            }
            elseif (\array_key_exists('rootfs', $data) && $data['rootfs'] === null) {
                $object->setRootfs(null);
            }
            return $object;
        }
        public function normalize(mixed $object, string $format = null, array $context = []) : array|string|int|float|bool|\ArrayObject|null
        {
            $data = [];
            if ($object->isInitialized('dockerVersion') && null !== $object->getDockerVersion()) {
                $data['DockerVersion'] = $object->getDockerVersion();
            }
            $data['Description'] = $object->getDescription();
            $data['Documentation'] = $object->getDocumentation();
            $data['Interface'] = $this->normalizer->normalize($object->getInterface(), 'json', $context);
            $values = [];
            foreach ($object->getEntrypoint() as $value) {
                $values[] = $value;
            }
            $data['Entrypoint'] = $values;
            $data['WorkDir'] = $object->getWorkDir();
            if ($object->isInitialized('user') && null !== $object->getUser()) {
                $data['User'] = $this->normalizer->normalize($object->getUser(), 'json', $context);
            }
            $data['Network'] = $this->normalizer->normalize($object->getNetwork(), 'json', $context);
            $data['Linux'] = $this->normalizer->normalize($object->getLinux(), 'json', $context);
            $data['PropagatedMount'] = $object->getPropagatedMount();
            $data['IpcHost'] = $object->getIpcHost();
            $data['PidHost'] = $object->getPidHost();
            $values_1 = [];
            foreach ($object->getMounts() as $value_1) {
                $values_1[] = $this->normalizer->normalize($value_1, 'json', $context);
            }
            $data['Mounts'] = $values_1;
            $values_2 = [];
            foreach ($object->getEnv() as $value_2) {
                $values_2[] = $this->normalizer->normalize($value_2, 'json', $context);
            }
            $data['Env'] = $values_2;
            $data['Args'] = $this->normalizer->normalize($object->getArgs(), 'json', $context);
            if ($object->isInitialized('rootfs') && null !== $object->getRootfs()) {
                $data['rootfs'] = $this->normalizer->normalize($object->getRootfs(), 'json', $context);
            }
            return $data;
        }
        public function getSupportedTypes(?string $format = null) : array
        {
            return ['Rouda\\Docker\\Api\\Model\\PluginConfig' => false];
        }
    }
} else {
    class PluginConfigNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;
        public function supportsDenormalization($data, $type, string $format = null, array $context = []) : bool
        {
            return $type === 'Rouda\\Docker\\Api\\Model\\PluginConfig';
        }
        public function supportsNormalization(mixed $data, string $format = null, array $context = []) : bool
        {
            return is_object($data) && get_class($data) === 'Rouda\\Docker\\Api\\Model\\PluginConfig';
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
            $object = new \Rouda\Docker\Api\Model\PluginConfig();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('DockerVersion', $data) && $data['DockerVersion'] !== null) {
                $object->setDockerVersion($data['DockerVersion']);
            }
            elseif (\array_key_exists('DockerVersion', $data) && $data['DockerVersion'] === null) {
                $object->setDockerVersion(null);
            }
            if (\array_key_exists('Description', $data) && $data['Description'] !== null) {
                $object->setDescription($data['Description']);
            }
            elseif (\array_key_exists('Description', $data) && $data['Description'] === null) {
                $object->setDescription(null);
            }
            if (\array_key_exists('Documentation', $data) && $data['Documentation'] !== null) {
                $object->setDocumentation($data['Documentation']);
            }
            elseif (\array_key_exists('Documentation', $data) && $data['Documentation'] === null) {
                $object->setDocumentation(null);
            }
            if (\array_key_exists('Interface', $data) && $data['Interface'] !== null) {
                $object->setInterface($this->denormalizer->denormalize($data['Interface'], 'Rouda\\Docker\\Api\\Model\\PluginConfigInterface', 'json', $context));
            }
            elseif (\array_key_exists('Interface', $data) && $data['Interface'] === null) {
                $object->setInterface(null);
            }
            if (\array_key_exists('Entrypoint', $data) && $data['Entrypoint'] !== null) {
                $values = [];
                foreach ($data['Entrypoint'] as $value) {
                    $values[] = $value;
                }
                $object->setEntrypoint($values);
            }
            elseif (\array_key_exists('Entrypoint', $data) && $data['Entrypoint'] === null) {
                $object->setEntrypoint(null);
            }
            if (\array_key_exists('WorkDir', $data) && $data['WorkDir'] !== null) {
                $object->setWorkDir($data['WorkDir']);
            }
            elseif (\array_key_exists('WorkDir', $data) && $data['WorkDir'] === null) {
                $object->setWorkDir(null);
            }
            if (\array_key_exists('User', $data) && $data['User'] !== null) {
                $object->setUser($this->denormalizer->denormalize($data['User'], 'Rouda\\Docker\\Api\\Model\\PluginConfigUser', 'json', $context));
            }
            elseif (\array_key_exists('User', $data) && $data['User'] === null) {
                $object->setUser(null);
            }
            if (\array_key_exists('Network', $data) && $data['Network'] !== null) {
                $object->setNetwork($this->denormalizer->denormalize($data['Network'], 'Rouda\\Docker\\Api\\Model\\PluginConfigNetwork', 'json', $context));
            }
            elseif (\array_key_exists('Network', $data) && $data['Network'] === null) {
                $object->setNetwork(null);
            }
            if (\array_key_exists('Linux', $data) && $data['Linux'] !== null) {
                $object->setLinux($this->denormalizer->denormalize($data['Linux'], 'Rouda\\Docker\\Api\\Model\\PluginConfigLinux', 'json', $context));
            }
            elseif (\array_key_exists('Linux', $data) && $data['Linux'] === null) {
                $object->setLinux(null);
            }
            if (\array_key_exists('PropagatedMount', $data) && $data['PropagatedMount'] !== null) {
                $object->setPropagatedMount($data['PropagatedMount']);
            }
            elseif (\array_key_exists('PropagatedMount', $data) && $data['PropagatedMount'] === null) {
                $object->setPropagatedMount(null);
            }
            if (\array_key_exists('IpcHost', $data) && $data['IpcHost'] !== null) {
                $object->setIpcHost($data['IpcHost']);
            }
            elseif (\array_key_exists('IpcHost', $data) && $data['IpcHost'] === null) {
                $object->setIpcHost(null);
            }
            if (\array_key_exists('PidHost', $data) && $data['PidHost'] !== null) {
                $object->setPidHost($data['PidHost']);
            }
            elseif (\array_key_exists('PidHost', $data) && $data['PidHost'] === null) {
                $object->setPidHost(null);
            }
            if (\array_key_exists('Mounts', $data) && $data['Mounts'] !== null) {
                $values_1 = [];
                foreach ($data['Mounts'] as $value_1) {
                    $values_1[] = $this->denormalizer->denormalize($value_1, 'Rouda\\Docker\\Api\\Model\\PluginMount', 'json', $context);
                }
                $object->setMounts($values_1);
            }
            elseif (\array_key_exists('Mounts', $data) && $data['Mounts'] === null) {
                $object->setMounts(null);
            }
            if (\array_key_exists('Env', $data) && $data['Env'] !== null) {
                $values_2 = [];
                foreach ($data['Env'] as $value_2) {
                    $values_2[] = $this->denormalizer->denormalize($value_2, 'Rouda\\Docker\\Api\\Model\\PluginEnv', 'json', $context);
                }
                $object->setEnv($values_2);
            }
            elseif (\array_key_exists('Env', $data) && $data['Env'] === null) {
                $object->setEnv(null);
            }
            if (\array_key_exists('Args', $data) && $data['Args'] !== null) {
                $object->setArgs($this->denormalizer->denormalize($data['Args'], 'Rouda\\Docker\\Api\\Model\\PluginConfigArgs', 'json', $context));
            }
            elseif (\array_key_exists('Args', $data) && $data['Args'] === null) {
                $object->setArgs(null);
            }
            if (\array_key_exists('rootfs', $data) && $data['rootfs'] !== null) {
                $object->setRootfs($this->denormalizer->denormalize($data['rootfs'], 'Rouda\\Docker\\Api\\Model\\PluginConfigRootfs', 'json', $context));
            }
            elseif (\array_key_exists('rootfs', $data) && $data['rootfs'] === null) {
                $object->setRootfs(null);
            }
            return $object;
        }
        /**
         * @return array|string|int|float|bool|\ArrayObject|null
         */
        public function normalize($object, $format = null, array $context = [])
        {
            $data = [];
            if ($object->isInitialized('dockerVersion') && null !== $object->getDockerVersion()) {
                $data['DockerVersion'] = $object->getDockerVersion();
            }
            $data['Description'] = $object->getDescription();
            $data['Documentation'] = $object->getDocumentation();
            $data['Interface'] = $this->normalizer->normalize($object->getInterface(), 'json', $context);
            $values = [];
            foreach ($object->getEntrypoint() as $value) {
                $values[] = $value;
            }
            $data['Entrypoint'] = $values;
            $data['WorkDir'] = $object->getWorkDir();
            if ($object->isInitialized('user') && null !== $object->getUser()) {
                $data['User'] = $this->normalizer->normalize($object->getUser(), 'json', $context);
            }
            $data['Network'] = $this->normalizer->normalize($object->getNetwork(), 'json', $context);
            $data['Linux'] = $this->normalizer->normalize($object->getLinux(), 'json', $context);
            $data['PropagatedMount'] = $object->getPropagatedMount();
            $data['IpcHost'] = $object->getIpcHost();
            $data['PidHost'] = $object->getPidHost();
            $values_1 = [];
            foreach ($object->getMounts() as $value_1) {
                $values_1[] = $this->normalizer->normalize($value_1, 'json', $context);
            }
            $data['Mounts'] = $values_1;
            $values_2 = [];
            foreach ($object->getEnv() as $value_2) {
                $values_2[] = $this->normalizer->normalize($value_2, 'json', $context);
            }
            $data['Env'] = $values_2;
            $data['Args'] = $this->normalizer->normalize($object->getArgs(), 'json', $context);
            if ($object->isInitialized('rootfs') && null !== $object->getRootfs()) {
                $data['rootfs'] = $this->normalizer->normalize($object->getRootfs(), 'json', $context);
            }
            return $data;
        }
        public function getSupportedTypes(?string $format = null) : array
        {
            return ['Rouda\\Docker\\Api\\Model\\PluginConfig' => false];
        }
    }
}