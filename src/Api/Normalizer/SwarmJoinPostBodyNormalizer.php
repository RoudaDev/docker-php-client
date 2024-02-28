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
    class SwarmJoinPostBodyNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;
        public function supportsDenormalization(mixed $data, string $type, string $format = null, array $context = []) : bool
        {
            return $type === 'Rouda\\Docker\\Api\\Model\\SwarmJoinPostBody';
        }
        public function supportsNormalization(mixed $data, string $format = null, array $context = []) : bool
        {
            return is_object($data) && get_class($data) === 'Rouda\\Docker\\Api\\Model\\SwarmJoinPostBody';
        }
        public function denormalize(mixed $data, string $type, string $format = null, array $context = []) : mixed
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new \Rouda\Docker\Api\Model\SwarmJoinPostBody();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('ListenAddr', $data) && $data['ListenAddr'] !== null) {
                $object->setListenAddr($data['ListenAddr']);
            }
            elseif (\array_key_exists('ListenAddr', $data) && $data['ListenAddr'] === null) {
                $object->setListenAddr(null);
            }
            if (\array_key_exists('AdvertiseAddr', $data) && $data['AdvertiseAddr'] !== null) {
                $object->setAdvertiseAddr($data['AdvertiseAddr']);
            }
            elseif (\array_key_exists('AdvertiseAddr', $data) && $data['AdvertiseAddr'] === null) {
                $object->setAdvertiseAddr(null);
            }
            if (\array_key_exists('DataPathAddr', $data) && $data['DataPathAddr'] !== null) {
                $object->setDataPathAddr($data['DataPathAddr']);
            }
            elseif (\array_key_exists('DataPathAddr', $data) && $data['DataPathAddr'] === null) {
                $object->setDataPathAddr(null);
            }
            if (\array_key_exists('RemoteAddrs', $data) && $data['RemoteAddrs'] !== null) {
                $values = [];
                foreach ($data['RemoteAddrs'] as $value) {
                    $values[] = $value;
                }
                $object->setRemoteAddrs($values);
            }
            elseif (\array_key_exists('RemoteAddrs', $data) && $data['RemoteAddrs'] === null) {
                $object->setRemoteAddrs(null);
            }
            if (\array_key_exists('JoinToken', $data) && $data['JoinToken'] !== null) {
                $object->setJoinToken($data['JoinToken']);
            }
            elseif (\array_key_exists('JoinToken', $data) && $data['JoinToken'] === null) {
                $object->setJoinToken(null);
            }
            return $object;
        }
        public function normalize(mixed $object, string $format = null, array $context = []) : array|string|int|float|bool|\ArrayObject|null
        {
            $data = [];
            if ($object->isInitialized('listenAddr') && null !== $object->getListenAddr()) {
                $data['ListenAddr'] = $object->getListenAddr();
            }
            if ($object->isInitialized('advertiseAddr') && null !== $object->getAdvertiseAddr()) {
                $data['AdvertiseAddr'] = $object->getAdvertiseAddr();
            }
            if ($object->isInitialized('dataPathAddr') && null !== $object->getDataPathAddr()) {
                $data['DataPathAddr'] = $object->getDataPathAddr();
            }
            if ($object->isInitialized('remoteAddrs') && null !== $object->getRemoteAddrs()) {
                $values = [];
                foreach ($object->getRemoteAddrs() as $value) {
                    $values[] = $value;
                }
                $data['RemoteAddrs'] = $values;
            }
            if ($object->isInitialized('joinToken') && null !== $object->getJoinToken()) {
                $data['JoinToken'] = $object->getJoinToken();
            }
            return $data;
        }
        public function getSupportedTypes(?string $format = null) : array
        {
            return ['Rouda\\Docker\\Api\\Model\\SwarmJoinPostBody' => false];
        }
    }
} else {
    class SwarmJoinPostBodyNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;
        public function supportsDenormalization($data, $type, string $format = null, array $context = []) : bool
        {
            return $type === 'Rouda\\Docker\\Api\\Model\\SwarmJoinPostBody';
        }
        public function supportsNormalization(mixed $data, string $format = null, array $context = []) : bool
        {
            return is_object($data) && get_class($data) === 'Rouda\\Docker\\Api\\Model\\SwarmJoinPostBody';
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
            $object = new \Rouda\Docker\Api\Model\SwarmJoinPostBody();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('ListenAddr', $data) && $data['ListenAddr'] !== null) {
                $object->setListenAddr($data['ListenAddr']);
            }
            elseif (\array_key_exists('ListenAddr', $data) && $data['ListenAddr'] === null) {
                $object->setListenAddr(null);
            }
            if (\array_key_exists('AdvertiseAddr', $data) && $data['AdvertiseAddr'] !== null) {
                $object->setAdvertiseAddr($data['AdvertiseAddr']);
            }
            elseif (\array_key_exists('AdvertiseAddr', $data) && $data['AdvertiseAddr'] === null) {
                $object->setAdvertiseAddr(null);
            }
            if (\array_key_exists('DataPathAddr', $data) && $data['DataPathAddr'] !== null) {
                $object->setDataPathAddr($data['DataPathAddr']);
            }
            elseif (\array_key_exists('DataPathAddr', $data) && $data['DataPathAddr'] === null) {
                $object->setDataPathAddr(null);
            }
            if (\array_key_exists('RemoteAddrs', $data) && $data['RemoteAddrs'] !== null) {
                $values = [];
                foreach ($data['RemoteAddrs'] as $value) {
                    $values[] = $value;
                }
                $object->setRemoteAddrs($values);
            }
            elseif (\array_key_exists('RemoteAddrs', $data) && $data['RemoteAddrs'] === null) {
                $object->setRemoteAddrs(null);
            }
            if (\array_key_exists('JoinToken', $data) && $data['JoinToken'] !== null) {
                $object->setJoinToken($data['JoinToken']);
            }
            elseif (\array_key_exists('JoinToken', $data) && $data['JoinToken'] === null) {
                $object->setJoinToken(null);
            }
            return $object;
        }
        /**
         * @return array|string|int|float|bool|\ArrayObject|null
         */
        public function normalize($object, $format = null, array $context = [])
        {
            $data = [];
            if ($object->isInitialized('listenAddr') && null !== $object->getListenAddr()) {
                $data['ListenAddr'] = $object->getListenAddr();
            }
            if ($object->isInitialized('advertiseAddr') && null !== $object->getAdvertiseAddr()) {
                $data['AdvertiseAddr'] = $object->getAdvertiseAddr();
            }
            if ($object->isInitialized('dataPathAddr') && null !== $object->getDataPathAddr()) {
                $data['DataPathAddr'] = $object->getDataPathAddr();
            }
            if ($object->isInitialized('remoteAddrs') && null !== $object->getRemoteAddrs()) {
                $values = [];
                foreach ($object->getRemoteAddrs() as $value) {
                    $values[] = $value;
                }
                $data['RemoteAddrs'] = $values;
            }
            if ($object->isInitialized('joinToken') && null !== $object->getJoinToken()) {
                $data['JoinToken'] = $object->getJoinToken();
            }
            return $data;
        }
        public function getSupportedTypes(?string $format = null) : array
        {
            return ['Rouda\\Docker\\Api\\Model\\SwarmJoinPostBody' => false];
        }
    }
}